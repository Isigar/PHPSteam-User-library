# PHPSteam-User-library

This library may help someone who want to use steam API and use it to fetch user data. With few lines of code you can fetch everything about user.

### CONTENT:
* user summary
* friends

### TODO:
* cache results
* achievement
* game stats

## How to use it?
#### HomepagePresenter
```php
public function renderSingle()
{
    $player = new Player("76561198151608925");
    $request = new Request();
    $request->getPlayerSummaries($player);
    $request->getPlayerFriends($player,5);
    Dumper::dump($player);
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
