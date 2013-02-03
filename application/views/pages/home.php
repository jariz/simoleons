<ul class="nav nav-tabs">
    <li><a href="#to" data-toggle="tab">To <span class="inline">$</span></a></li>
    <li><a href="#from" data-toggle="tab">From <span class="inline">$</span> </a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="to">
        <div class="hero-unit from">
            <h1 id="amount" class="moneyz">$655454.545</h1>
            <span class="middle">is worth</span>
            <h1 class="moneyz"><span class="inline">$</span><span id="simoleons">32323,4,43,,433232.2.332.</span></h1>
        </div>

        <?=form_open("sim/convertfrom", "class=\"convertfrom\"")?>
        <select name="type" class="currency">
            {curr}<option{active} value="{code}">{name}</option>{/curr}
        </select>
        <input name="q" type="number" step="any" autocomplete="off" class="currency">
        <button type="submit" class="btn btn-large sim btn-success">$</button>
        </form>
    </div>
    <div class="tab-pane" id="from">
        <?=form_open("sim/convertfrom", "class=\"convertfrom")?></select>
        <input name="q" type="number" step="any" autocomplete="off" class
        <select name="type" class="currency">
            {curr}<option{active} value="{code}">{name}</option>{/curr}
        </select>="currency">
        <button type="submit" class="btn btn-lawarning btn-success">$</button>
        </form>
    </div>
</div>