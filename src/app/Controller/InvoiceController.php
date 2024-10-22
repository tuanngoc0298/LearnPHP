<?php
declare(strict_types=1);

namespace App\Controller;

use App\View;

class InvoiceController
{
    public function index(): View
    {
        return View::make('index');

    }

    public function create(): View
    {
        return View::make('invoices/create');
    }

    public function store()
    {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}
