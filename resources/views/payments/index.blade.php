<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Payments</h2>
    </x-slot>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg max-w-6xl mx-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Course</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Amount</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Bank</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Proof</th>
                    @if (auth()->user()->is_admin)
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">User</th>
                        <th class="px-4 py-2"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-2">{{ $payment->course->title }}</td>
                        <td class="px-4 py-2">Rp{{ number_format($payment->amount, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $payment->bank->name }}</td>
                        <td class="px-4 py-2">{{ ucfirst($payment->status->value) }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('payments.payment-proof.show', $payment) }}" target="_blank"
                                class="text-blue-500 hover:underline">View</a>
                        </td>
                        @if (auth()->user()->is_admin)
                            <td class="px-4 py-2">{{ $payment->user->name }}</td>
                            <td class="px-4 py-2">
                                @if ($payment->status === \App\Enums\PaymentStatus::PENDING)
                                    <form method="POST" action="{{ route('payments.updateStatus', $payment) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status"
                                            class="rounded border-gray-300 dark:bg-gray-800 dark:text-white">
                                            <option value="completed">Completed</option>
                                            <option value="failed">Failed</option>
                                        </select>
                                        <button type="submit"
                                            class="ml-2 bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Update</button>
                                    </form>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
