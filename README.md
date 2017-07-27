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
### Depency:
- Nette\Utils\Json
- Nette\Object
- PHP 5.4+
