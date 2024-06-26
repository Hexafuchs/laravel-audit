<?php

use Hexafuchs\Audit\Http\Controllers\AuditController;
use Illuminate\Support\Facades\Route;

Route::middleware(config('audit.middleware'))
    ->any(config('audit.path'), AuditController::class.'@handle')->name('audit');
