<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>
@extends('layouts.mainlayout')

@section('content')

<div class="container">

    <section id="page_top">
        <div class="row">
            <div class="col-md-7">
                <h2 class="page_title">My Account</h2>
            </div>

            <div class="col-md-5">
                
            </div>
        </div>
    </section>

    <section id="page_content" class="pt30 pd50">
        
        <div class="row">
            
            <div class="col-md-8">
                <div class="section_content">
                    <div class="profile_info_itm">
                        <div class="label">Name</div>
                        <div class="text_content">{{ $user->name }}</div>
                    </div>

                    <div class="profile_info_itm">
                        <div class="label">Email</div>
                        <div class="text_content">{{ $user->email }}</div>
                    </div>

                    <div class="profile_info_itm">
                        <div class="label">Phone</div>
                        <div class="text_content">{{ $userinfo->phone }}</div>
                    </div>

                    <div class="profile_info_itm">
                        <div class="label">Address</div>
                        <div class="text_content">{{ $userinfo->address }}</div>
                    </div>

                    <div class="profile_info_itm">
                        <div class="label">City</div>
                        <div class="text_content">{{ $userinfo->country == 'Nigeria' ? $userinfo->city : $userinfo->city_alt }}</div>
                    </div>

                    <div class="profile_info_itm">
                        <div class="label">Country</div>
                        <div class="text_content">{{ $userinfo->country }}</div>
                    </div>

                    <div class="profile_info_itm">
                        <br>
                        <div class="btn_wrap">
                            <a href="" class="btn btn-danger">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-md-offset-1">
                <div class="sidebar">
                    @include('includes.user_account_sidebar')
                </div>
            </div>

        </div>

    </div>
</main>

@stop