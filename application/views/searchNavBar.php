<ul class="nav nav-tabs ">
    <li class="nav-item">
        <a class="nav-link <?php if($active_tab=="flight") { echo "active";} ?>" href="<?= site_url() ?>">
            <i class="icofont-ui-flight"></i> <span>Flight</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($active_tab=="hotel") { echo "active";} ?>" href="<?= site_url() ?>hotel">
            <i class="icofont-hotel"></i>
            <span>Hotel</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($active_tab=="holiday") { echo "active";} ?>" href="<?= site_url()?>holiday">
            <i class="icofont-beach-bed"></i>
            <span>Holiday</span>
        </a>
    </li>
    <li class="nav-item">				
        <a class="nav-link <?= ($active_tab=="visa") ? "active" : null ?>" href="<?= site_url() ?>visa">
            <i class="icofont-visa-alt"></i>
            <span>Visa</span>
        </a>
    </li>
    <li class="nav-item">				
        <a class="nav-link <?= ($active_tab == "bus") ? "active" : null ?>" href="<?= site_url() ?>bus">
            <i class="icofont-bus-alt-2"></i>
            <span>Bus</span>
        </a>
    </li>
</ul>