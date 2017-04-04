@if (count($module['children']) > 0)

    <paper-submenu>
        
        <paper-item class="menu-trigger menu-select">
            <iron-icon icon="{{ $module['icon'] }}"></iron-icon>
            {{ $module['name'] }}         
        </paper-item>
        
        <paper-menu class="menu-content">
            
            @foreach ($module['children'] as $module)
                @include('layouts.menuItem', array('module' => $module))
            @endforeach
            
        </paper-menu>
        
    </paper-submenu>

@else

    <paper-item class="menu-select">
        <iron-icon icon="{{ $module['icon'] }}"></iron-icon>
        {{ $module['name'] }}       
    </paper-item>

@endif