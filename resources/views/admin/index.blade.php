@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('src/css/modal.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="#" class="btn">New Post</a></li>
                        <li><a href="#" class="btn">Show all Posts</a></li>
                    </ul>
                </nav>
            </header>
            </header>
            <section>
                <ul>

                        <li>
                            <article>
                                <div class="post-info">
                                    <h3>Post</h3>
                                    <span class="info">name | date</span>
                                </div>
                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="#">View Post</a></li>
                                            <li><a href="#">Edit</a></li>
                                            <li><a href="#" class="danger">Delete</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </article>
                        </li>

                </ul>
            </section>
        </div>
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="#" class="btn">Show all Messages</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>

                        <li>
                            <article data-message="}" data-id="" class="contact-message">
                                <div class="message-info">
                                    <h3>subject</h3>
                                    <span class="info">Sender: message | date</span>
                                </div>
                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="#">View</a></li>
                                            <li><a href="#" class="danger">Delete</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </article>
                        </li>

                </ul>
            </section>
        </div>
    </div>

    <div class="modal" id="contact-message-info">
        <button class="btn" id="modal-close">Close</button>
    </div>
@endsection

@section('scripts')
    <script>
        var token = "{{ Session::token() }}";
    </script>
    <script src="{{ URL::to('src/js/modal.js') }}"></script>
    <script src="{{ URL::to('src/js/contact_messages.js') }}"></script>
@endsection