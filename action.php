<?php
/**
 * DokuWiki Plugin appendtoquery (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Melanger <plugins@melanger.cz>
 */
class action_plugin_appendtoquery extends \dokuwiki\Extension\ActionPlugin
{

    /** @inheritDoc */
    public function register($controller)
    {
        $controller->register_hook('SEARCH_QUERY_FULLPAGE', 'BEFORE', $this, 'handle_search_query_fullpage');
        $controller->register_hook('SEARCH_QUERY_PAGELOOKUP', 'BEFORE', $this, 'handle_search_query_pagelookup');
   
    }

    /**
     * Append a string to search queries.
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  optional parameter passed when event was registered
     * @return void
     */
    public function handle_search_query_fullpage($event, $param)
    {
        global $conf;
        $event->data['query'] = $event->data['query'] . $this->getConf('queryappend');
    }

    /**
     * Append a string to search queries.
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  optional parameter passed when event was registered
     * @return void
     */
    public function handle_search_query_pagelookup($event, $param)
    {
        global $conf;
        $event->data['id'] = $event->data['id'] . $this->getConf('queryappend');
    }
}
