@extends('layouts.app')
<h1>{{ Auth::guard('admin')->user() }}</h1>