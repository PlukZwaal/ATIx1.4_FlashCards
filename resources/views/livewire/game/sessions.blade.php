<div style="padding: 20px; font-family: Arial, sans-serif; background-color: #f4f7fb;">
    @foreach($sessions as $session)
        @php
            $percentage = $session->correct_percentage;
            $percentageColor = $percentage >= 75 ? '#2e7d32' : ($percentage >= 50 ? '#f9a825' : '#c62828');
        @endphp

        <div style="background-color: #ffffff; margin-bottom: 24px; padding: 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); position: relative;">

            <span style="position: absolute; top: 20px; left: 20px; font-size: 18px; font-weight: bold; color: #222;">
                {{ $session->deck->title }}
            </span>

            <div style="position: absolute; top: 20px; right: 20px; text-align: right;">
                <div style="color: #666; font-size: 13px;">
                    {{ \Carbon\Carbon::parse($session->created_at)->diffForHumans() }}
                </div>
                <div style="font-size: 18px; font-weight: bold; color: {{ $percentageColor }};">
                    {{ $percentage }}%
                </div>
            </div>

            <ul style="list-style: none; padding: 0; margin-top: 60px; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px;">
                @foreach($session->correct_cards as $card)
                    <li style="background-color: #e8f5e9; padding: 12px; border-radius: 6px; color: #2e7d32;">
                        <div><strong>{{ $card->front }}</strong></div>
                        <div>{{ $card->back }}</div>
                    </li>
                @endforeach
            </ul>

            <ul style="list-style: none; padding: 0; margin-top: 16px; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px;">
                @foreach($session->incorrect_cards as $card)
                    <li style="background-color: #ffebee; padding: 12px; border-radius: 6px; color: #c62828;">
                        <div><strong>{{ $card->front }}</strong></div>
                        <div>{{ $card->back }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
