<?php
namespace TargetQodef\Modules\Shortcodes\Lib;

use TargetQodef\Modules\Shortcodes\InteractiveBanner\InteractiveBanner;
use TargetQodef\Modules\PricingSlider\PricingSlider;
use TargetQodef\Modules\ServiceTable\ServiceTable;
use TargetQodef\Modules\Shortcodes\Accordion\Accordion;
use TargetQodef\Modules\Shortcodes\AccordionTab\AccordionTab;
use TargetQodef\Modules\Shortcodes\AdvancedVerticalSlider\AdvancedVerticalSlider;
use TargetQodef\Modules\Shortcodes\AdvancedVerticalSliderItem\AdvancedVerticalSliderItem;
use TargetQodef\Modules\Shortcodes\Blockquote\Blockquote;
use TargetQodef\Modules\Shortcodes\BlogList\BlogList;
use TargetQodef\Modules\Shortcodes\Button\Button;
use TargetQodef\Modules\Shortcodes\CallToAction\CallToAction;
use TargetQodef\Modules\Shortcodes\Counter\Countdown;
use TargetQodef\Modules\Shortcodes\Counter\Counter;
use TargetQodef\Modules\Shortcodes\CustomFont\CustomFont;
use TargetQodef\Modules\Shortcodes\DeviceSlider\DeviceSlider;
use TargetQodef\Modules\Shortcodes\DeviceMarquee\DeviceMarquee;
use TargetQodef\Modules\Shortcodes\Dropcaps\Dropcaps;
use TargetQodef\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use TargetQodef\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use TargetQodef\Modules\Shortcodes\GoogleMap\GoogleMap;
use TargetQodef\Modules\Shortcodes\Highlight\Highlight;
use TargetQodef\Modules\Shortcodes\HorizontalTimeline\HorizontalTimeline;
use TargetQodef\Modules\Shortcodes\HorizontalTimelineItem\HorizontalTimelineItem;
use TargetQodef\Modules\Shortcodes\Icon\Icon;
use TargetQodef\Modules\Shortcodes\IconListItem\IconListItem;
use TargetQodef\Modules\Shortcodes\IconWithText\IconWithText;
use TargetQodef\Modules\Shortcodes\ImageGallery\ImageGallery;
use TargetQodef\Modules\Shortcodes\ItemShowcase\ItemShowcase;
use TargetQodef\Modules\Shortcodes\ItemShowcaseListItem\ItemShowcaseListItem;
use TargetQodef\Modules\Shortcodes\Message\Message;
use TargetQodef\Modules\Shortcodes\OrderedList\OrderedList;
use TargetQodef\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use TargetQodef\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use TargetQodef\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use TargetQodef\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use TargetQodef\Modules\Shortcodes\PricingTables\PricingTables;
use TargetQodef\Modules\Shortcodes\PricingTable\PricingTable;
use TargetQodef\Modules\Shortcodes\Process\ProcessHolder;
use TargetQodef\Modules\Shortcodes\Process\ProcessItem;
use TargetQodef\Modules\Shortcodes\ProductList\ProductList;
use TargetQodef\Modules\Shortcodes\ProgressBar\ProgressBar;
use TargetQodef\Modules\Shortcodes\Separator\Separator;
use TargetQodef\Modules\Shortcodes\SocialShare\SocialShare;
use TargetQodef\Modules\Shortcodes\Tabs\Tabs;
use TargetQodef\Modules\Shortcodes\Tab\Tab;
use TargetQodef\Modules\Shortcodes\Team\Team;
use TargetQodef\Modules\Shortcodes\UnorderedList\UnorderedList;
use TargetQodef\Modules\Shortcodes\VideoButton\VideoButton;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
    /**
     * @var private instance of current class
     */
    private static $instance;
    /**
     * @var array
     */
    private $loadedShortcodes = array();

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {}

    /**
     * Private sleep because of Singletone
     */
    public function __wakeup() {}

    /**
     * Private clone because of Singletone
     */
    private function __clone() {}

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if(self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    /**
     * Adds new shortcode. Object that it takes must implement ShortcodeInterface
     * @param ShortcodeInterface $shortcode
     */
    private function addShortcode(ShortcodeInterface $shortcode) {
        if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
            $this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
        }
    }

    /**
     * Adds all shortcodes.
     *
     * @see ShortcodeLoader::addShortcode()
     */
    private function addShortcodes() {
        $this->addShortcode(new Accordion());
        $this->addShortcode(new AccordionTab());
        $this->addShortcode(new AdvancedVerticalSlider());
        $this->addShortcode(new AdvancedVerticalSliderItem());
        $this->addShortcode(new Blockquote());
        $this->addShortcode(new BlogList());
        $this->addShortcode(new Button());
        $this->addShortcode(new CallToAction());
        $this->addShortcode(new Counter());
        $this->addShortcode(new Countdown());
        $this->addShortcode(new CustomFont());
        $this->addShortcode(new DeviceSlider());
        $this->addShortcode(new DeviceMarquee());
        $this->addShortcode(new Dropcaps());
        $this->addShortcode(new ElementsHolder());
        $this->addShortcode(new ElementsHolderItem());
        $this->addShortcode(new GoogleMap());
        $this->addShortcode(new Highlight());
        $this->addShortcode(new HorizontalTimeline());
        $this->addShortcode(new HorizontalTimelineItem());
        $this->addShortcode(new Icon());
        $this->addShortcode(new IconListItem());
        $this->addShortcode(new IconWithText());
        $this->addShortcode(new ImageGallery());
        $this->addShortcode(new InteractiveBanner());
        $this->addShortcode(new ItemShowcase());
        $this->addShortcode(new ItemShowcaseListItem());
        $this->addShortcode(new Message());
        $this->addShortcode(new OrderedList());
        $this->addShortcode(new PieChartBasic());
        $this->addShortcode(new PieChartDoughnut());
        $this->addShortcode(new PieChartPie());
        $this->addShortcode(new PieChartWithIcon());
        $this->addShortcode(new PricingTables());
        $this->addShortcode(new PricingTable());
        $this->addShortcode(new PricingSlider());
        $this->addShortcode(new ProcessHolder());
        $this->addShortcode(new ProcessItem());
        $this->addShortcode(new ProductList());
        $this->addShortcode(new ProgressBar());
        $this->addShortcode(new Separator());
        $this->addShortcode(new SocialShare());
        $this->addShortcode(new ServiceTable());
        $this->addShortcode(new Tabs());
        $this->addShortcode(new Tab());
        $this->addShortcode(new Team());
        $this->addShortcode(new UnorderedList());
        $this->addShortcode(new VideoButton());
    }
    /**
     * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
     * of each shortcode object
     */
    public function load() {
        $this->addShortcodes();

        foreach ($this->loadedShortcodes as $shortcode) {
            add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
        }
    }
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();