
<section class="section aside">
    <p>Categoria</p>

    @foreach ($categories as $category)
        <div class="aside--input">
            <a href="{{ route($route, ['ct' => $category]) }}"> {{ $category->category }}</a>
        </div>
    @endforeach
    <div class="aside--input">
        <a href="{{ route($route) }}">Ver todo</a>
    </div>
