@extends('layouts.app')

@section('content')
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-8 text-gradient">RAM Marketing Styleguide</h1>
    
    <div class="space-y-12">
      <!-- Colors -->
      <section class="space-y-4">
        <h2 class="text-2xl font-bold mb-4">Colors</h2>
        
        <!-- Text Colors -->
        <div class="card p-6 space-y-2">
          <h3 class="font-bold mb-4">Text Colors</h3>
          <p class="text-ram-blue">This is text-ram-blue</p>
          <p class="text-ram-blue-light">This is text-ram-blue-light</p>
          <p class="text-ram-blue-dark">This is text-ram-blue-dark</p>
          <p class="text-ram-purple">This is text-ram-purple</p>
          <p class="text-ram-purple-light">This is text-ram-purple-light</p>
          <p class="text-ram-purple-dark">This is text-ram-purple-dark</p>
        </div>

        <!-- Background Colors -->
        <div class="card p-6 space-y-2">
          <h3 class="font-bold mb-4">Background Colors</h3>
          <div class="bg-ram-blue text-white p-4 rounded-lg">This is bg-ram-blue</div>
          <div class="bg-ram-blue-light text-white p-4 rounded-lg">This is bg-ram-blue-light</div>
          <div class="bg-ram-blue-dark text-white p-4 rounded-lg">This is bg-ram-blue-dark</div>
          <div class="bg-ram-purple text-white p-4 rounded-lg">This is bg-ram-purple</div>
          <div class="bg-ram-purple-light text-white p-4 rounded-lg">This is bg-ram-purple-light</div>
          <div class="bg-ram-purple-dark text-white p-4 rounded-lg">This is bg-ram-purple-dark</div>
        </div>
      </section>

      <!-- Buttons -->
      <section class="space-y-4">
        <h2 class="text-2xl font-bold mb-4">Buttons</h2>
        <div class="card p-6">
          <div class="space-x-4">
            <button class="btn btn-primary">Primary Button</button>
            <button class="btn btn-outline">Outline Button</button>
          </div>
        </div>
      </section>

      <!-- Cards -->
      <section class="space-y-4">
        <h2 class="text-2xl font-bold mb-4">Cards</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="card p-6 hover-lift">
            <h3 class="font-bold mb-2">Hover Lift Card</h3>
            <p class="text-gray-600">This card lifts on hover</p>
          </div>
          <div class="card p-6 hover-scale">
            <h3 class="font-bold mb-2">Hover Scale Card</h3>
            <p class="text-gray-600">This card scales on hover</p>
          </div>
          <div class="card p-6">
            <h3 class="font-bold mb-2">Basic Card</h3>
            <p class="text-gray-600">This is a basic card with shadow</p>
          </div>
        </div>
      </section>

      <!-- Icons -->
      <section class="space-y-4">
        <h2 class="text-2xl font-bold mb-4">Icons</h2>
        <div class="card p-6">
          <div class="flex items-center space-x-8">
            <svg class="icon-sm text-ram-blue" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
              <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
            </svg>
            <svg class="icon text-ram-blue" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
            </svg>
            <svg class="icon-lg text-ram-blue" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
            <svg class="icon-xl text-ram-blue" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
            </svg>
          </div>
        </div>
      </section>

      <!-- Text Styles -->
      <section class="space-y-4">
        <h2 class="text-2xl font-bold mb-4">Text Styles</h2>
        <div class="card p-6 space-y-4">
          <h3 class="text-4xl font-bold text-gradient">Gradient Heading</h3>
          <div class="space-y-2">
            <p class="text-xl font-display font-bold">Display Font</p>
            <p class="text-xl font-sans">Sans Font</p>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection 