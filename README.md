# PHPSteam-User-library

This library may help someone who want to use steam API and use it to fetch user data. With few lines of code you can fetch everything about user.

#### Install:
composer require relisoft/php-steam-user-library

### CONTENT:
* user summary
* friends
* game stats
* cache results
* recently played games
* inventory (with item details)
* login via steam

### TODO:
* achievement
* trade support


## How to use it?
#### HomepagePresenter
```php
public function renderSingle()
{
    $player = new Player("76561198151608925");
    $request = new Request();
    $request->getPlayerFriends($player,2);
    $request->getPlayerRecentlyPlayedGames($player);
    $request->getPlayerInventory($player,Games::CSGO);
    Dumper::dump($player);
}
```
##### But what we do if we need cache results?
> We will use new functions and we will load full user profile and system automaticly cache it. It's cache function call so if some result will be different it will automaticly reload data.
```php
public function renderSingle()
{
    $player = new Player("76561198151608925");
    $request = new Request();
    $player = $request->getFullData($player); // This function will load full profile (profile, recent games, friends, inventory)
    $this->template->items = $player->getInventory()->getData();
}
```
#### Dump:
![Image of dump data](https://image.prntscr.com/image/rfQhzUxqRJevoRclpy5eOw.png)
#### Getting / Setting data
> Every variable did you see above have get and set function within you can set every variable and get it too. 
```php
$player->getState()
$player->getLastlogoff()
$player->getFriends()
```
#### Persona state
> Persona state is one class with you can translate value from API to english language or edit to html return value.
```php
Relisoft\Steam\Src\API\PersonaState::getVerbState($player->getPersonaState())
```
## Login
### Login button:
> For this purpose i created Button class with two static function whitch will return source link to img.
```php
<div class="container">
    <a href="{link login!}"><img src="{Relisoft\Steam\Src\Login\Button::rectangle()}"></a>
</div>
Relisoft\Steam\Src\Login\Button::rectangle()
Relisoft\Steam\Src\Login\Button::square()
```
### Login function
> For this i created class Login whitch use $session to store user data. You have to add your source of $session or use default $_SESSION. I did this because i am using nette/http in my all project with better session api.
###### Create instance
```php
$this->login = new Login($this->session->getSection("steam"));
OR
$this->login = new Login($_SESSION);
```
###### Usage
```php
public function handleLogin()
    {
        $login = $this->login; 

        if($login->isLogged()) // If is use logged in
        {
            $this->flashMessage("User is logged."); //Flash message like echo
            $this->redirect("single",$this->session->getSection("steam")->user); // This you can edit for your purpose
        }
        else
        {
            $object = $login->auth(); // Auth user and return states

            if($object) //IF SUCCESS RETURN STEAM ID
            {
                $this->flashMessage("successfuly logged in $object"); //Echo some text
                $this->redirect("single",$object); // Redirect to another page with parameter $object -> returning STEAM ID
            }
            elseif($object == $login::FAILED)
            {
                $this->flashMessage("Steam is not logged in!"); //Echo that's failed
                $this->redirect("this"); //Redirect
            }
            elseif($object == $login::CANCEL) //Echo that's your cancel process
            {
                $this->flashMessage("Cancel by user");
                $this->redirect("this");
            }
        }
    }
```
##### Login states:
```php
const CANCEL = "cancel";
const SUCCESS = "success";
const FAILED = "failed";
```
### Depency:
- nette/utils
- nette/neon
- nette/caching
- PHP 5.4+
