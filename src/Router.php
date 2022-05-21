<?php

class Router
{
    private string $page;
    private string $action;
    private string $id;

    private array $routesAuthorized;
    private array $actionsAuthorized;

    /**
     * Init with list of authorized routes
     */
    public function __construct($page, $action, $id)
    {
        $this->routesAuthorized = ['recette', 'ingredient', 'region', 'utilisateur'];
        $this->actionsAuthorized = ['index', 'edit', 'add', 'delete'];
        $this->setGetUrlParams($page, $action, $id);
    }

    /**
     * @param string $page
     * @param string $action
     * @param string $id
     * @return void
     */
    public function setGetUrlParams(string $page, string $action, string $id)
    {
        if ($page) {
            if (in_array($page, $this->routesAuthorized)) {
                $this->page = $page;
            }
        }
        if ($action) {
            if (in_array($action, $this->actionsAuthorized)) {
                $this->action = $action;
            }
        }
        if ($id) {
            $this->id = $id;
        }
    }

    /**
     * @return void
     */
    public function displayPage()
    {

        $page = isset($this->page) ? $this->page : '';
        $action = isset($this->action) ? $this->action : '';
        $id = isset($this->id) ? $this->id : '';

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