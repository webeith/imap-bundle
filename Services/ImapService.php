<?php

namespace Webeith\ImapBundle\Services;

use Webeith\ImapBundle\Exception\DirNotExistsException,
    Webeith\ImapBundle\Exception\NotFoundMailboxException;

/**
 * ImapService
 *
 */
class ImapService
{
    /**
     * @var array
     */
    protected $config = array();

    /**
     * @var array
     */
    protected $mailboxes = array();

    /**
     * Constructor
     *
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Create mailbox
     *
     * @param mixed $name
     *
     * @return \ImapMailbox
     */
    public function getMailBox($name)
    {
        if (isset($this->mailboxes[$name])) {
            return $this->mailboxes[$name];
        }

        if (!isset($this->config['mailboxes'][$name])) {
            throw new NotFoundMailboxException('Not found config for "' .$name. '" mailbox');
        }

        $config = $this->config['mailboxes'][$name];
        if (!is_dir($config['attachments_dir'])) {
            throw new DirNotExistsException('It is not dir: ' . $config['attachments_dir']);
        }

        $this->mailboxes[$name] = new \ImapMailbox($config['connection_string'], $config['login'], $config['password'], $config['attachments_dir'], $config['encoding']);

        return $this->mailboxes[$name];
    }
}
