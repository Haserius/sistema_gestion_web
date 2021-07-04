@if (Request::is('companies*','home','users*','roles*','audits*'))
    <li class="nav-item has-treeview {{ Request::is('companies*','users*','roles*','audits*') ? 'menu-open' : '' }}">
        <a href="" class="nav-link inactive">
            <i class="nav-icon fas fa-code"></i>
            <p>
                Administrar
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: {{ Request::is('companies*','users*','roles*','audits*') ? 'block' : 'none' }}">

                <li class="nav-item">
                    <a href="{{ route('companies.index') }}"
                    class="nav-link {{ Request::is('companies*') ? 'active' : '' }}">
                        <p>@lang('models/companies.plural')</p>
                    </a>
                </li>


            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                    <p>@lang('models/users.plural')</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}"
                class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                    <p>@lang('models/roles.plural')</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('audits.index') }}"
                class="nav-link {{ Request::is('audits*') ? 'active' : '' }}">
                    <p>@lang('models/audits.plural')</p>
                </a>
            </li>
        </ul>
    </li>
@endif
@if (Request::is('company*','suppliers*','customers*','businessUnits*','supplyChains*'))
    @can('admin_empresas')
        <li class="nav-item">
            {{-- <a href="{{ route('suppliers.index') }}" --}}
            <a href="{{ route('company.showCompany', [$company_id]) }}"
            class="nav-link {{ Request::is('company') ? 'active' : '' }}">
                <p>@lang('models/companies.singular')</p>
            </a>
        </li>
    @endcan
    @can('admin_proveedores')
        <li class="nav-item">
            {{-- <a href="{{ route('suppliers.index') }}" --}}
            <a href="{{ route('suppliers.index', [$company_id]) }}"
            class="nav-link {{ Request::is('*suppliers') ? 'active' : '' }}">
                <p>@lang('models/suppliers.plural')</p>
            </a>
        </li>
    @endcan
    @can('admin_clientes')
        <li class="nav-item">
            <a href="{{ route('customers.index', [$company_id]) }}"
            class="nav-link {{ Request::is('*customers') ? 'active' : '' }}">
                <p>@lang('models/customers.plural')</p>
            </a>
        </li>
    @endcan
    @can('admin_unidad_negocio')
        <li class="nav-item">
            <a href="{{ route('businessUnits.index', [$company_id]) }}"
            class="nav-link {{ Request::is('*businessUnits') ? 'active' : '' }}">
                <p>@lang('models/businessUnits.plural')</p>
            </a>
        </li>
    @endcan
    @can('admin_cadena_suministro')
        <li class="nav-item">
            <a href="{{ route('supplyChains.index', [$company_id]) }}"
            class="nav-link {{ Request::is('*supplyChains') ? 'active' : '' }}">
                <p>@lang('models/supplyChains.plural')</p>
            </a>
        </li>
    @endcan
@endif
