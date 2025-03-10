<?php

use App\Models\Blog;

it('blogs found', function () {
    $response = $this->get('/blogs');
    expect($response->status())->toBe(201);
});

it('one blog found', function () {
    $response = $this->get('/blogs/1');
    expect($response->status())->toBe(201);
});

it('blogs delete', function () {
    $response = $this->delete('/blogs/1');
    expect($response->status())->toBe(201);
});

 
