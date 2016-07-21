<?php

namespace gossi\swagger;

use gossi\swagger\parts\ExtensionPart;
use gossi\swagger\Util\MergeHelper;
use phootwork\collection\CollectionUtils;
use phootwork\lang\Arrayable;

class Contact extends AbstractModel implements Arrayable
{
    use ExtensionPart;

    /** @var string */
    private $name;

    /** @var string */
    private $url;

    /** @var string */
    private $email;

    public function __construct($data = [])
    {
        $this->merge($data);
    }

    protected function doMerge($data, $overwrite = false)
    {
        MergeHelper::mergeFields($this->name, $data['name'] ?? null, $overwrite);
        MergeHelper::mergeFields($this->url, $data['url'] ?? null, $overwrite);
        MergeHelper::mergeFields($this->email, $data['email'] ?? null, $overwrite);

        $data = CollectionUtils::toMap($data);

        // extensions
        $this->parseExtensions($data);
    }

    public function toArray()
    {
        return $this->export('name', 'url', 'email');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
