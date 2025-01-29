@extends('front.layout.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8">
                <div class="card mb-4 shadow-sm ">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/developer.jpg') }}" 
                                 class="rounded-circle mb-3" 
                                 alt="Mosses Aryo Bimo"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                            <h1 class="card-title display-5 ms-5">Hi, I'm Mosses 👋</h1>
                            <p class="lead text-muted me-3">Full-Stack Developer & Tech Enthusiast</p>
                        </div>

                        <div class="mb-5">
                            <h3 class="mb-4 text-primary">Welcome to Moblogs</h3>
                            <p class="card-text fs-5">
                                Thank you for stopping by! Moblogs is my passion project - a constantly evolving space where I share tech insights, development experiences, and programming discoveries. Currently in its growth phase, I'm actively working to enhance your experience while maintaining quality content.
                            </p>
                            <div class="alert alert-info mt-4">
                                <i class="fas fa-tools me-2"></i>
                                <strong>Heads up!</strong> We're in active development. Your patience with occasional quirks helps us improve daily. Found something? I'd love to hear about it! Just contact me at contact page
                            </div>
                        </div>

                        <div class="mb-5">
                            <h3 class="mb-4 text-primary">What Drives Me</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100 border-0">
                                        <div class="card-body">
                                            <h5 class="card-title">Passion for Learning</h5>
                                            <p class="card-text">I thrive on learning new technologies and improving my skills. Every project is an opportunity to grow.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100 border-0">
                                        <div class="card-body">
                                            <h5 class="card-title">Community Engagement</h5>
                                            <p class="card-text">I believe in sharing knowledge and helping others. Engaging with the developer community inspires me to keep pushing boundaries.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h3 class="mb-4 text-primary">Get in Touch</h3>
                            <p class="card-text">I’d love to hear from you! Whether you have feedback, suggestions, or just want to chat, feel free to reach out.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://twitter.com/mossesaryo" class="btn btn-outline-primary">Twitter</a></li>
                                <li class="list-inline-item"><a href="https://github.com/mossesaryo" class="btn btn-outline-secondary">GitHub</a></li>
                                <li class="list-inline-item"><a href="mailto:mosses@example.com" class="btn btn-outline-success">Email</a></li>
                            </ul>
                        </div>

                        <p class="card-text text-center">Thank you for visiting Moblogs! 🚀</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection