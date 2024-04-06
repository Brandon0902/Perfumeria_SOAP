@extends('layouts.frontend')

@section('content')
<div class="bg-gradient-to-r from-purple-500 to-blue-500 py-16" style="background: rgb(20,172,155); background: linear-gradient(90deg, rgba(20,172,155,0.9360119047619048) 12%, rgba(243,255,45,1) 70%);">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-extrabold text-black text-center mb-8">SOMOS <span class="text-red-500">LEONMEE</span></h1>
        <p class="text-xl text-white text-center">La mejor opción en perfumes nacionales y europeos</p>
    </div>
</div>

<div class="bg-gradient-to-r from-gray-200 to-gray-100 py-16" >
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
            <p class="text-lg text-gray-700 leading-relaxed">
                En LEONMEE, nos enorgullece ofrecerte una experiencia única en perfumes. Somos una boutique de fragancias que se especializa en perfumes nacionales y europeos de la más alta calidad. Con una amplia selección de fragancias exquisitas, desde clásicas hasta modernas, estamos seguros de tener el perfume perfecto para cada ocasión y gusto.
            </p>
        </div>
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">En qué nos destacamos</h2>
            <ul class="list-disc list-inside">
                <li class="text-lg text-gray-700 mb-2">Calidad de productos: Nos dedicamos a ofrecer solo perfumes de la más alta calidad, tanto nacionales como europeos.</li>
                <li class="text-lg text-gray-700 mb-2">Variedad de selección: Contamos con una amplia gama de fragancias, desde clásicas hasta modernas, para satisfacer todos los gustos.</li>
                <li class="text-lg text-gray-700 mb-2">Experiencia personalizada: Nuestro equipo está comprometido a brindarte una atención personalizada y asesoramiento experto para ayudarte a encontrar el perfume perfecto.</li>
                <li class="text-lg text-gray-700 mb-2">Precios competitivos: Ofrecemos precios competitivos para que puedas disfrutar de tus fragancias favoritas sin romper tu presupuesto.</li>
            </ul>
        </div>
    </div>
</div>
@yield('footer')
@endsection