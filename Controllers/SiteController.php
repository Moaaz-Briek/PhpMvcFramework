<?php
namespace app\Controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\SiteMiddleware;
use app\core\Request;
use app\core\Response;
use app\Models\ContactForm;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new SiteMiddleware(['']));
    }

    public function home()
    {
        $params = [
            'name' => 'UserName',
        ];
        return $this->render('home', $params);
    }

    public  function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks For Contacting Us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}