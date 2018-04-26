<?php

namespace PosInvoice\Services;

use Plenty\Modules\Account\Contact\Contracts\ContactClassRepositoryContract;
use Plenty\Modules\Account\Contact\Contracts\ContactRepositoryContract;
use Plenty\Modules\Account\Contact\Models\Contact;

/**
 * Class ContactService
 * @package PosInvoice\Services
 */
class ContactService
{
    /** @var ContactRepositoryContract $contactRepo */
    private $contactRepo;

    /** @var ContactClassRepositoryContract $contactClassRepo */
    private $contactClassRepo;

    /**
     * ContactService constructor.
     * @param ContactRepositoryContract $contactRepositoryContract
     * @param ContactClassRepositoryContract $contactClassRepositoryContract
     */
    public function __construct(
        ContactRepositoryContract $contactRepositoryContract,
        ContactClassRepositoryContract $contactClassRepositoryContract
    ) {
        $this->contactRepo = $contactRepositoryContract;
        $this->contactClassRepo = $contactClassRepositoryContract;
    }

    /**
     * @param $contactId
     * @return Contact|null
     */
    public function getContact($contactId)
    {
        try {
            /** @var Contact $contact */
            $contact = $this->contactRepo->findContactById($contactId);
            return $contact;
        } catch (\Exception $modelNotFoundException) {
            return null;
        }
    }

    /**
     * @param $contactId
     * @return array|null
     */
    public function getContactInvoiceClassData($contactId)
    {
        $contact = $this->getContact($contactId);

        if (is_null($contact)) {
            return null;
        }

        $contactInvoiceConfig = $this->contactClassRepo->findContactClassDataById($contact->classId);

        return $contactInvoiceConfig;
    }
}