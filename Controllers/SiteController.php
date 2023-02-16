<?php
namespace app\Controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\middlewares\SiteMiddleware;
use app\Core\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new SiteMiddleware(['']));
    }

    public function home()
    {

        $params = [
            'name' => 'Moaaz',
        ];
        return $this->render('home', $params);
    }

    public  function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling';
    }

}