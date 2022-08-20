<div class="row masonry">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">Server Summary</div>
            <div class="card-body">
                @include('summary.tables.summary')
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">Survivor Awards Summary</div>
            <div class="card-body">
                @include('summary.tables.survivor_awards')
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">Infected Kills Summary</div>
            <div class="card-body">
                @include('summary.tables.infected_kills')
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">Demerits Summary</div>
            <div class="card-body">
                @include('summary.tables.demerits')
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">Infected Awards</div>
            <div class="card-body">
                @include('summary.tables.infected_awards')
            </div>
        </div>
    </div>
</div>