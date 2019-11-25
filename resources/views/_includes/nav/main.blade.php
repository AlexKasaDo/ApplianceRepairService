<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Appliance Repair</div>
    <div class="list-group list-group-flush">
        <a  href="#" class=" list-group-item btn btn-light" data-toggle="modal" data-target="#addNew"> <img
                src="{{ asset('svg/add_circle_outline-24px.svg') }}" alt="+"> Add New...</a>
        <a href="{{route('manage.dashboard')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="{{route('jobs.index')}}" class="list-group-item list-group-item-action bg-light">Jobs</a>
        <a href="{{route('contacts.index')}}" class="list-group-item list-group-item-action bg-light">Contacts</a>
        <a href="{{route('users.index')}}" class="list-group-item list-group-item-action bg-light">Users</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Invoices</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New ...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group list-group-flush">
                    <a href="{{route('contacts.create')}}" class="list-group-item list-group-item-action bg-light">Add
                        New Contact</a>
                    <a href="{{route('jobs.create')}}" class="list-group-item list-group-item-action bg-light">Add New
                        Jobs</a>
                    {{--<a href="{{route('contacts.index')}}" class="list-group-item list-group-item-action bg-light">Contacts</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

