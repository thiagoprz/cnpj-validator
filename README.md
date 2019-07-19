**CNPJ Validator**
==
A Laravel package to work with CNPJ validation.

CNPJ is the National Reistry of Legal Entities in Brazil.

Installation
--

`` composer install thiagoprz/cnpj-validator ``

Usage
--
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CnpjController extends Controller
{
    ...
    /**
     * Store action
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cnpj' => 'cnpj', // CNPJ validation
            ...
        ]);
        ...
    }
    ...
}
```