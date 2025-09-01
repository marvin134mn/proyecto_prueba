<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Potion Estudios Online') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* Se ha mantenido el CSS de Tailwind para asegurar compatibilidad */
                /* Se omiten los estilos por brevedad, pero se incluirían en producción */
            </style>
        @endif

        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #4f46e5 0%, #7e22ce 100%);
            }
            
            .hero-pattern {
                background-color: #111827;
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%234f46e5' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }
            
            .card-hover {
                transition: all 0.3s ease;
            }
            
            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
            }
            
            .btn-primary {
                background: linear-gradient(135deg, #4f46e5 0%, #7e22ce 100%);
                transition: all 0.3s ease;
            }
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #4338ca 0%, #6b21a8 100%);
                transform: translateY(-2px);
            }
        </style>
    </head>
    <body class="hero-pattern min-h-screen flex flex-col text-gray-100">
        <!-- Header con navegación -->
        <header class="w-full py-4 px-6 lg:px-8 bg-gray-900 border-b border-gray-800">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="w-32 h-auto">
                </div>
                
                @if (Route::has('login'))
                    <nav class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-gray-300 hover:text-indigo-400 transition duration-150">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-300 hover:text-indigo-400 transition duration-150">
                                Iniciar Sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <!-- Sección Hero -->
        <main class="flex-grow">
            <section class="py-12 lg:py-24">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="lg:w-1/2 text-center lg:text-left mb-10 lg:mb-0">
                            <h1 class="text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">
                                Aprende habilidades nuevas con nuestros <span class="text-indigo-400">cursos en línea</span>
                            </h1>
                            <p class="text-xl text-gray-300 mb-8">
                                Descubre cientos de cursos impartidos por expertos de la industria. Comienza tu journey de aprendizaje hoy mismo.
                            </p>
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center lg:justify-start">
                                <a href="#" class="px-8 py-3 bg-indigo-600 text-white text-lg font-medium rounded-md shadow-md hover:bg-indigo-700 transition duration-300">
                                    Explorar Cursos
                                </a>
                                <a href="#" class="px-8 py-3 border border-gray-600 text-gray-300 text-lg font-medium rounded-md hover:bg-gray-800 transition duration-300">
                                    Ver Demo
                                </a>
                            </div>
                        </div>
                        <div class="lg:w-1/2 flex justify-center">
                            <div class="relative">
                                <div class="absolute -inset-4 bg-indigo-900 rounded-xl rotate-3 opacity-50"></div>
                                <img src="https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Learning" class="relative rounded-xl shadow-lg w-full max-w-md">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Características -->
            <section class="py-16 bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-bold text-white mb-4">¿Por qué elegirnos?</h2>
                        <p class="text-xl text-gray-300 max-w-3xl mx-auto">Ofrecemos una experiencia de aprendizaje excepcional con los mejores instructores y contenido de calidad.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-gray-800 p-8 rounded-xl card-hover text-center">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-900 text-indigo-400 mb-6">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-4">Instructores Expertos</h3>
                            <p class="text-gray-400">Aprende de profesionales con años de experiencia en la industria y pasión por enseñar.</p>
                        </div>
                        
                        <div class="bg-gray-800 p-8 rounded-xl card-hover text-center">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-900 text-indigo-400 mb-6">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-4">Acceso Ilimitado</h3>
                            <p class="text-gray-400">Estudia a tu propio ritmo, en cualquier momento y desde cualquier dispositivo.</p>
                        </div>
                        
                        <div class="bg-gray-800 p-8 rounded-xl card-hover text-center">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-900 text-indigo-400 mb-6">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-4">Aprendizaje Práctico</h3>
                            <p class="text-gray-400">Proyectos del mundo real y ejercicios prácticos para aplicar lo que aprendes.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="gradient-bg py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-bold text-white mb-6">¿Listo para comenzar?</h2>
                    <p class="text-xl text-indigo-200 mb-8 max-w-3xl mx-auto">Únete a miles de estudiantes que ya están avanzando en sus carreras con nuestros cursos.</p>
                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-white text-indigo-700 text-lg font-medium rounded-md shadow-md hover:bg-gray-100 transition duration-300">
                                Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-indigo-700 text-lg font-medium rounded-md shadow-md hover:bg-gray-100 transition duration-300">
                                Crear Cuenta
                            </a>
                            <a href="{{ route('login') }}" class="px-8 py-3 border border-white text-white text-lg font-medium rounded-md hover:bg-white hover:text-indigo-700 transition duration-300">
                                Iniciar Sesión
                            </a>
                        @endauth
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12 border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Potion Estudios Online</h3>
                        <p class="text-gray-400">Plataforma de aprendizaje en línea con los mejores cursos para impulsar tu carrera.</p>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Inicio</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Cursos</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Precios</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Blog</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Soporte</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Centro de Ayuda</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Contáctanos</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Políticas</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Suscríbete</h4>
                        <p class="text-gray-400 mb-4">Recibe actualizaciones sobre nuevos cursos y ofertas especiales.</p>
                        <form class="flex">
                            <input type="email" placeholder="Tu email" class="px-4 py-2 w-full rounded-l-md focus:outline-none bg-gray-800 text-white border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900">
                            <button type="submit" class="bg-indigo-600 px-4 py-2 rounded-r-md hover:bg-indigo-700 transition">Enviar</button>
                        </form>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400">© 2023 Potion Estudios Online. Todos los derechos reservados.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 极 11.675-6.253 11.675-极.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 极 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>