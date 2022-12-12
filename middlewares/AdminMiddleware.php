<?php 
namespace app\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;
use app\core\middlewares\BaseMiddleware;

class AdminMiddleware extends BaseMiddleware{

    private const ADMIN_ROLE = 'admin';


    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

	public function execute() {
        if (Application::isGuest() ||  Application::$app->user->role != self::ADMIN_ROLE) {
            if (empty($this->actions) || in_array(Application::$app->controller->action,$this->actions)) {
                throw new ForbiddenException();
            }
        }

	}
}
