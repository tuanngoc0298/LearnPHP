<?php
declare(strict_types=1);

namespace App\Controller;

class Invoice
{
    public function index()
    {
        return 'Invoice';
    }

    public function create()
    {
        return '<form action="/invoices/create" method="post"><label>Amount</label><input type="text" name="amount"/></form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}
