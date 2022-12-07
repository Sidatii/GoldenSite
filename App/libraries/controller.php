<?php
/* Base controller
 * Loads the models and views
 */
class Controller
{
    // Load model
    public function model($model)
    {
        //require model file
        require_once '../App/models' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    // Load view
    public function view($view, $data = [])
    {
        // Check for the view file
        if (file_exists('../App/views/' . $view . '.php')) {
            require_once '../App/views/' . $view . '.php';
        } else {
            //view does not exist
            die('view does not exist');
        }
    }
}



?>