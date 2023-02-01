@extends("layout")

@section("title", "dashboard")

@section("content")
<div class="dashboard_wrapper wrapper">
    <h3 class="main-heading">Seu dashboard</h3>
    <div class="dashboard_body">
        <div class="dashboard_discussions">
            <h3 class="dashboard_heading">Seus topicos</h3>
            <div class="dashboard_interior">
                @if($user ->discussion -> count() < 1)
                <p class="no-data">Sem topicos</p>
                @else

                @endif
            </div>
        </div>
        <div class="dashboard_responses">
            <h3 class="dashboard_heading">Respostas</h3>
            <div class="dashboard_interior">
                @if($user -> discussion -> count() < 1)
                <p class="no-data">Sem respostas</p>
                @else

                @endif
            </div>
        </div>
    </div>
</div>
@endsection