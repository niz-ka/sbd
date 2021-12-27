@if(session("status-error"))
    <div class="mb-12 bg-red-300 p-4 rounded-xl text-red-900 font-bold flex items-center">
        <i class="fas fa-times mr-2"></i>
        <div>{{ session("status-error") }}</div>
    </div>
@endif
