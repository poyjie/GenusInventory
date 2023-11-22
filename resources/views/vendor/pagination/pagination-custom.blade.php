@if ($paginator->hasPages()) 
<div class="site-block-27"> 
    <ul> 
        @if ($paginator->onFirstPage()) 
        <li class=" disabled"> 
            <a class="" href="#" 
              tabindex="-1">&lt;</a> 
        </li> 
        @else 
        <li class=""><a class="" 
            href="{{ $paginator->previousPageUrl() }}"> 
            &lt;</a> 
          </li> 
        @endif 
  
        @foreach ($elements as $element) 
        @if (is_string($element)) 
        <li class=" disabled">{{ $element }}</li> 
        @endif 
  
        @if (is_array($element)) 
        @foreach ($element as $page => $url) 
        @if ($page == $paginator->currentPage()) 
        <li class=" active"> 
            <a class="">{{ $page }}</a> 
        </li> 
        @else 
        <li class=""> 
            <a class="" 
              href="{{ $url }}">{{ $page }}</a> 
        </li> 
        @endif 
        @endforeach 
        @endif 
        @endforeach 
  
        @if ($paginator->hasMorePages()) 
        <li class=""> 
            <a class="" 
              href="{{ $paginator->nextPageUrl() }}"  
              rel="next">&gt;</a> 
        </li> 
        @else 
        <li class=" disabled"> 
            <a class="" href="#">&gt;</a> 
        </li> 
        @endif 
    </ul> 
  </div> 
@endif 