@extends('layouts.admin')

@section('content')

<section class="content">

  <style>
    .sec {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }
    
    .menu {
      float: left;
    }
    
    .menu {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .nav{
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    
    .menu nav:hover {
      background-color: #111;
    }
    </style>
   <h1>
   </h1>
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
             <div class="card card-primary">
               <div class="card-header"><h5>2023 Report</h5></div>

                  <center><label class="main-title float-left"> </label><center>
             

                    {{-- <ul class="sec">
                      @foreach($mainsection as $item)
                          <li class="menu"><a class="{{ $item->active ? 'active' : '' }} nav" href="#{{ $item->name }}">{{ $item->name }}</a></li>
                      @endforeach
                  </ul>
<br> --}}

                  <style>
                    /* Styling for the horizontal menu */
                    ul.menu {
                      list-style-type: none;
                      margin: 0;
                      padding: 0;
                    }

                    ul.menu li {
                      display: inline-block;
                      position: relative;
                      padding: 10px;
                      background-color: #141414;
                      cursor: pointer;
                    }

                    ul.menu li:hover {
                      background-color: #ccc;
                    }

                    /* Styling for the submenus */
                    ul.submenu {
                      display: none;
                      position: absolute;
                      top: 100%;
                      left: 0;
                      background-color: #111111;
                      padding: 0;
                      white-space: nowrap; /* Prevent submenu items from wrapping */
                    }

                    ul.submenu li {
                      display: inline-block; /* Display submenu items horizontally */
                      padding: 10px;
                    }

                    ul.menu li:hover > ul.submenu {
                      display: block;
                    }

                    ul.submenu li {
                      display: inline-block;
                    }
                  </style>

                  <ul class="menu">
                    @foreach($mainsection as $main)
                    <li>
                      <a class="{{ isset($main->active) && $main->active ? 'active' : '' }} nav" href="#{{ $main->name }}">{{ $main->name }}</a>
                      <ul class="submenu">
                        @foreach($subsection as $sub)
                        <li>
                          <a class="{{ isset($sub->active) && $sub->active ? 'active' : '' }} nav" href="#{{ $sub->name }}">{{ $sub->name }}</a>
                        </li>
                        @endforeach
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                 
              </div>
                 
             </div>
           </div>
    
   
 
   
   
 
   
 
   </div>
   </section>

@endsection