@if(session("status"))
    <div class="mb-12 bg-green-300 p-4 rounded-xl text-green-900 font-bold flex items-center">
        <i class="fas fa-check mr-2"></i>
        <div>{{ session("status") }}</div>
    </div>
@endif
