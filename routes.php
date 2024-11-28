<?php
// routes.php

require_once 'app/controllers/EnrollmentController.php';
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/CoursesController.php';

$controllerCourses = new CoursesController();
$controller = new UserController();
$controller1 = new EnrollmentController();

$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/enrollment/index' || $url == '/') {
    $controller1->index();
} elseif ($url == '/enrollment/create' && $requestMethod == 'GET') {
    $controller1->create();
} elseif ($url == '/enrollment/store' && $requestMethod == 'POST') {
    $controller1->store();
} elseif (preg_match('/\/enrollment\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $controller1->edit($id);
} elseif (preg_match('/\/enrollment\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $controller1->update($id, $_POST);
} elseif (preg_match('/\/enrollment\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $controller1->delete($id);
    
} elseif ($url == '/user/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/user/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/user/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/user\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->edit($userId);
} elseif (preg_match('/\/user\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controller->update($userId, $_POST);
} elseif (preg_match('/\/user\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->delete($userId);
} 

elseif ($url === '/courses/index' || $url === '/') {
    $controllerCourses->index();
} elseif ($url === '/courses/create' && $requestMethod === 'GET') {
    $controllerCourses->create(); 
} elseif ($url === '/courses/store' && $requestMethod === 'POST') {
    $controllerCourses->store(); 
} elseif (preg_match('/^\/courses\/edit\/(\d+)$/', $url, $matches) && $requestMethod === 'GET') {
    $courseId = intval($matches[1]); 
    $controllerCourses->editCourse($courseId);
} elseif (preg_match('/^\/courses\/update\/(\d+)$/', $url, $matches) && $requestMethod === 'POST') {
    $courseId = intval($matches[1]); 
    $controllerCourses->updateCourse($courseId);
} elseif (preg_match('/^\/courses\/delete\/(\d+)$/', $url, $matches) && $requestMethod === 'POST') {
    $courseId = intval($matches[1]); 
    $controllerCourses->deleteCourse($courseId); 
} else {
    http_response_code(404);
    echo "404 Not Found";
}