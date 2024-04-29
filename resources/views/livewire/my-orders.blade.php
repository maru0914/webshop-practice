<x-panel title="注文一覧" class="max-w-lg mx-auto mt-12">
    <div>
        <table class="w-full">
            <thead>
            <tr>
                <th class="text-left">注文</th>
                <th class="text-left">注文日時</th>
                <th class="text-right">合計</th>
            </tr>
            </thead>
            <tbody>
            @foreach($this->orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('view-order', $order->id) }}" class="underline font-medium">#{{ $order->id }}</a>
                    </td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td class="text-right">{{ $order->amount_total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-panel>
