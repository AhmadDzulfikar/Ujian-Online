@extends('layouts.app')
<h1>{{ Auth::guard('proktor')->user() }}<h1>