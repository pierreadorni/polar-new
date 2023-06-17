<div class="flex flex-col items-center bg-gray-200">
    @if(count($timeSlots) > 0)
        <svg width="400" height="200" viewBox="0 0 410 250">
            <g transform="translate(200,235)" stroke-width="1">
                @foreach($timeSlots as $timeSlot)
                    <path
                        d="M0 0 {{ cos(pi()-(pi()*$loop->index/count($timeSlots)))*200 }} {{ -sin(pi()-(pi()*$loop->index/count($timeSlots)))*200}} A199 199 0 0 1 {{ cos(pi()-(pi()*($loop->index+1)/count($timeSlots)))*200 }} {{ -sin(pi()-(pi()*($loop->index+1)/count($timeSlots)))*200}}Z"
                        fill="{{ count($timeSlot->members) > 0 ? "#499647" : "#C25858" }}"
                    />
                @endforeach
            </g>
            <g transform="translate(200, 235)" fill="rgb(229 231 235)" stroke="rgb(229 231 235)" stroke-width="1">
                <path d="M0 0 -140 0 A139 139 0 0 1 140 0Z"/>
            </g>
            <g transform="translate(200,235)" stroke-width="1">
                @foreach($timeSlots as $timeSlot)
                    <path
                        d="M0 0 {{ cos(pi()-(pi()*$loop->index/count($timeSlots)))*130 }} {{ -sin(pi()-(pi()*$loop->index/count($timeSlots)))*130}} A129 129 0 0 1 {{ cos(pi()-(pi()*($loop->index+1)/count($timeSlots)))*130 }} {{ -sin(pi()-(pi()*($loop->index+1)/count($timeSlots)))*130}}Z"
                        fill="{{ count($timeSlot->members) > 0 ? "#499647" : "#C25858" }}"
                    />
                @endforeach
            </g>
            <g transform="translate(200, 235)" fill="rgb(229 231 235)" stroke="rgb(229 231 235)" stroke-width="1">
                <path d="M0 0 -120 0 A119 119 0 0 1 120 0Z"/>
                @foreach($timeSlots as $timeSlot)
                    <text
                        x="{{ cos(pi()-(pi()*($loop->index)/count($timeSlots)))*95 }}"
                        y="{{ -sin(pi()-(pi()*($loop->index)/count($timeSlots)))*95 }}"
                        fill="black"
                        text-anchor="middle"
                        alignment-baseline="middle"
                        font-size="14"
                        stroke-width="0"
                    >
                        {{ explode(":",$timeSlot->start_time)[0]."h".explode(":",$timeSlot->start_time)[1] }}
                    </text>
                @endforeach
                @if(count($timeSlots) > 0)
                    <text
                        x="95"
                        y="0"
                        fill="black"
                        text-anchor="middle"
                        alignment-baseline="middle"
                        font-size="14"
                        stroke-width="0"
                    >
                        {{ explode(":",$timeSlots->last()->end_time)[0]."h".explode(":",$timeSlots->last()->end_time)[1] }}
                    </text>

                    <!-- show current time -->
                    <line
                        x1="{{ cos(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*135 }}"
                        y1="{{ -sin(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*135 }}"
                        x2="{{ cos(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*200 }}"
                        y2="{{ -sin(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*200 }}"
                        stroke-width="3"
                        stroke="white"
                    />
                    <line
                        x1="{{ cos(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*135 }}"
                        y1="{{ -sin(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*135 }}"
                        x2="{{ cos(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*210 }}"
                        y2="{{ -sin(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*210 }}"
                        stroke-width="1"
                        stroke="black"
                    />
                    <circle
                        r="5"
                        fill="black"
                        cx="{{ cos(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*135 }}"
                        cy="{{ -sin(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*135 }}"
                    />
                    <text
                        x="{{ cos(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*220 }}"
                        y="{{ -sin(pi()-(pi()*(time() - strtotime($timeSlots->first()->start_time))/(strtotime($timeSlots->last()->end_time) - strtotime($timeSlots->first()->start_time))))*220 }}"
                        fill="black"
                        text-anchor="middle"
                        alignment-baseline="middle"
                        font-size="20"
                        font-weight="600"
                        stroke-width="0"
                    >
                        {{ date("H:i") }}
                    </text>
                @endif
            </g>
        </svg>
    @else
        <svg width="400" height="200" viewBox="0 0 410 250">
            <g transform="translate(200,235)" stroke-width="1">
                <path
                    d="M0 0 -200 0 A199 199 0 0 1 200 0Z"
                    fill="#C25858"
                />
            </g>
            <g transform="translate(200, 235)" fill="rgb(229 231 235)" stroke="rgb(229 231 235)" stroke-width="1">
                <path d="M0 0 -140 0 A139 139 0 0 1 140 0Z"/>
            </g>
            <g transform="translate(200,235)" stroke-width="1">
                <path
                    d="M0 0 -130 0 A129 129 0 0 1 130 0Z"
                    fill="#C25858"
                />
            </g>
            <g transform="translate(200, 235)" fill="rgb(229 231 235)" stroke="rgb(229 231 235)" stroke-width="1">
                <path d="M0 0 -120 0 A119 119 0 0 1 120 0Z"/>
                    <text
                        x="-95"
                        y="0"
                        fill="black"
                        text-anchor="middle"
                        alignment-baseline="middle"
                        font-size="14"
                        stroke-width="0"
                    >
                        {{ explode(":",$minOpeningTime)[0]."h".explode(":",$minOpeningTime)[1] }}
                    </text>
                <text
                    x="95"
                    y="0"
                    fill="black"
                    text-anchor="middle"
                    alignment-baseline="middle"
                    font-size="14"
                    stroke-width="0"
                >
                    {{ explode(":",$maxClosingTime)[0]."h".explode(":",$maxClosingTime)[1] }}
                </text>

                <!-- show current time -->
                <line
                    x1="{{ cos(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*135 }}"
                    y1="{{ -sin(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*135 }}"
                    x2="{{ cos(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*200 }}"
                    y2="{{ -sin(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*200 }}"
                    stroke-width="3"
                    stroke="white"
                />
                <line
                    x1="{{ cos(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*135 }}"
                    y1="{{ -sin(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*135 }}"
                    x2="{{ cos(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*210 }}"
                    y2="{{ -sin(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*210 }}"
                    stroke-width="1"
                    stroke="black"
                />
                <circle
                    r="5"
                    fill="black"
                    cx="{{ cos(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*135 }}"
                    cy="{{ -sin(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*135 }}"
                />
                <text
                    x="{{ cos(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*230 }}"
                    y="{{ -sin(pi()-(pi()*(time() - strtotime($minOpeningTime))/(strtotime($maxClosingTime) - strtotime($minOpeningTime))))*230 }}"
                    fill="black"
                    text-anchor="middle"
                    alignment-baseline="middle"
                    font-size="20"
                    font-weight="600"
                    stroke-width="0"
                >
                    {{ date("H:i") }}
                </text>
            </g>
        </svg>
    @endif
    <span class="mt-10 text-2xl">Actuellement le Polar est</span>
    @if($open)
        <span class="text-2xl text-green-700 font-bold">ouvert</span>
    @else
        <span class="text-2xl text-red-700 font-bold">fermé</span>
    @endif
</div>
