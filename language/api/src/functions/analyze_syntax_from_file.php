<?php
/*
 * Copyright 2016 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * For instructions on how to run the full sample:
 *
 * @see https://github.com/GoogleCloudPlatform/php-docs-samples/tree/master/language/README.md
 */

namespace Google\Cloud\Samples\Language;

# [START analyze_syntax_from_file]
use Google\Cloud\NaturalLanguage\NaturalLanguageClient;
use Google\Cloud\NaturalLanguage\Annotation;
use Google\Cloud\Storage\StorageClient;

/**
 * Find the syntax in text stored in a Cloud Storage bucket.
 * ```
 * analyze_syntax_from_file('my-bucket', 'file_with_text.txt');
 * ```
 *
 * @param string $bucketName The Cloud Storage bucket.
 * @param string $objectName The Cloud Storage object with text.
 *
 * @return Annotation
 */
function analyze_syntax_from_file($bucketName, $objectName, $options = [])
{
    // Create the Cloud Storage object
    $storage = new StorageClient();
    $bucket = $storage->bucket($bucketName);
    $storageObject = $bucket->object($objectName);

    // Call the Natural Language client
    $language = new NaturalLanguageClient();
    $annotation = $language->analyzeSyntax($storageObject, $options);
    return $annotation;
}
# [END analyze_syntax_from_file]
