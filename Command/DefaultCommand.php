<?php

namespace Webeith\ImapBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Write description
 *
 */
class DefaultCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('test:imap')
            ->setDescription('Gather mail bounce stat');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $mailbox = $this->getContainer()->get('imap')->getMailBox('gmail_webeith');

        $mailsIds = $mailbox->searchMailBox('UNSEEN');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }
        print_r($mailsIds);
        print_r($mailbox->checkMailbox());


        foreach ($mailsIds as $mailId) {
            echo $mailbox->getOriginalMail($mailId);
        }
        foreach ($mailbox->getMailsInfo($mailsIds) as $info) {
            preg_match('~<(.*)>~', $info->message_id, $output);
            var_dump($output[1]);

        }




        //var_dump($this->getContainer()->getParameter('webeith_imap.config'));
        var_dump('exe'); die();
        //$servers = $this->getContainer()->getParameter('swift_mail_agent.mailagent.servers');

        $em = $this->getContainer()->get('doctrine')->getManager();
    }
}
