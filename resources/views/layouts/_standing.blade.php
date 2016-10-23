<div id="{{ $tab_one }}" class="tab-content active">
    <div class="franchise-{{ ${$franchise} }}">
        <span>
            <p>rank</p>
            <p>{{ ${$rank} }}</p>
        </span>

        <span>
            <p>points back</p>
            <p>{{ number_format(${$points_back}, 1) }}</p>
        </span>
    </div>

    <div>
        <ul class="total @if (${$total} === $total_top) top @endif">
            <li>
                <h6>Total</h6>
                <span>{{ ${$total} }}</span>
            </li>
        </ul>

        <ul class="skater @if (${$skater} === $skater_top) top @endif">
            <li>
                <h6>Skater</h6>
                <span>{{ ${$skater} }}</span>
            </li>
        </ul>

        <ul class="goalie @if (${$goalie} === $goalie_top) top @endif">
            <li>
                <h6>Goalie</h6>
                <span>{{ ${$goalie} }}</span>
            </li>
        </ul>

        <ul class="team @if (${$team} === $team_top) top @endif">
            <li>
                <h6>Team</h6>
                <span>{{ ${$team} }}</span>
            </li>
       </ul>
    </div>
</div>

<div id="{{ $tab_two }}" class="tab-content">
    <div class="franchise-{{ ${$franchise} }}">
        <span>
            <p>best</p>
            <p>{{ ${$best} }}</p>
        </span>

        <span>
            <p>worst</p>
            <p>{{ ${$worst} }}</p>
        </span>

        <span>
            <p>average</p>
            <p>{{ number_format(${$average} / $week_last, 1) }}</p>
        </span>
    </div>

    <div>
        <div>
            <div style="height:{{ ${$w01} / 76 * 100 }}%">
                <span>week 01: <span>{{ ${$w01} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w02} / 76 * 100 }}%">
                <span>week 02: <span>{{ ${$w02} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w03} / 76 * 100 }}%">
                <span>week 03: <span>{{ ${$w03} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w04} / 76 * 100 }}%">
                <span>week 04: <span>{{ ${$w04} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w05} / 76 * 100 }}%">
                <span>week 05: <span>{{ ${$w05} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w06} / 76 * 100 }}%">
                <span>week 06: <span>{{ ${$w06} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w07} / 76 * 100 }}%">
                <span>week 07: <span>{{ ${$w07} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w08} / 76 * 100 }}%">
                <span>week 08: <span>{{ ${$w08} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w09} / 76 * 100 }}%">
                <span>week 09: <span>{{ ${$w09} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w10} / 76 * 100 }}%">
                <span>week 10: <span>{{ ${$w10} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w11} / 76 * 100 }}%">
                <span>week 11: <span>{{ ${$w11} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w12} / 76 * 100 }}%">
                <span>week 12: <span>{{ ${$w12} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w13} / 76 * 100 }}%">
                <span>week 13: <span>{{ ${$w13} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w14} / 76 * 100 }}%">
                <span>week 14: <span>{{ ${$w14} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w15} / 76 * 100 }}%">
                <span>week 15: <span>{{ ${$w15} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w16} / 76 * 100 }}%">
                <span>week 16: <span>{{ ${$w16} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w17} / 76 * 100 }}%">
                <span>week 17: <span>{{ ${$w17} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w18} / 76 * 100 }}%">
                <span>week 18: <span>{{ ${$w18} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w19} / 76 * 100 }}%">
                <span>week 19: <span>{{ ${$w19} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w20} / 76 * 100 }}%">
                <span>week 20: <span>{{ ${$w20} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w21} / 76 * 100 }}%">
                <span>week 21: <span>{{ ${$w21} }}</span></span>
            </div>
        </div>

        <div>
            <div style="height:{{ ${$w22} / 76 * 100 }}%">
                <span>week 22: <span>{{ ${$w22} }}</span></span>
            </div>
        </div>
    </div>
</div>
