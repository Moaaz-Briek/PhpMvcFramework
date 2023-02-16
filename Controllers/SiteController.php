<?php
namespace app\Controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\middlewares\SiteMiddleware;
use app\Core\Request;
use app\Core\Response;
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