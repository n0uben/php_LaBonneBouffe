<?php

class Router
{
    private array $routesAuthorized;
    private array $actionsAuthorized;

    /**
     * Init with list of authorized routes
     */
    public function __construct()
    {
        $this->routesAuthorized = ['recette', 'ingredient', 'region', 'utilisateur'];
        $this->actionsAuthorized = ['index', 'edit', 'add', 'delete'];
    }

    /**
     * @return void
     */
    public function displayPage(string $page, string $action, string $id)
    {
        $page = in_array($page, $this->routesAuthorized) ? $page : '';
        $action = in_array($action, $this->actionsAuthorized) ? $action : '';

        require_once __DIR__ . '/controller/' . ucfirst($page) . 'Controller.php';
        $controllerName = ucfirst($page) . 'Controller';
        $controller = new $controllerName();

        switch ($action) {
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            case 'add' :
                $controller->add();
                break;
            default:
                $controller->index();
                break;
        }
    }
}