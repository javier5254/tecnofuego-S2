<?php
// This file was auto-generated from sdk-root/src/data/runtime.sagemaker/2017-05-13/docs-2.json
return [ 'version' => '2.0', 'service' => '<p> The Amazon SageMaker runtime API. </p>', 'operations' => [ 'InvokeEndpoint' => '<p>After you deploy a model into production using Amazon SageMaker hosting services, your client applications use this API to get inferences from the model hosted at the specified endpoint. </p> <p>For an overview of Amazon SageMaker, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/how-it-works.html">How It Works</a>. </p> <p>Amazon SageMaker strips all POST headers except those supported by the API. Amazon SageMaker might add additional headers. You should not rely on the behavior of headers outside those enumerated in the request syntax. </p> <p>Calls to <code>InvokeEndpoint</code> are authenticated by using AWS Signature Version 4. For information, see <a href="https://docs.aws.amazon.com/AmazonS3/latest/API/sig-v4-authenticating-requests.html">Authenticating Requests (AWS Signature Version 4)</a> in the <i>Amazon S3 API Reference</i>.</p> <p>A customer\'s model containers must respond to requests within 60 seconds. The model itself can have a maximum processing time of 60 seconds before responding to invocations. If your model is going to take 50-60 seconds of processing time, the SDK socket timeout should be set to be 70 seconds.</p> <note> <p>Endpoints are scoped to an individual account, and are not public. The URL does not contain the account ID, but Amazon SageMaker determines the account ID from the authentication token that is supplied by the caller.</p> </note>', ], 'shapes' => [ 'BodyBlob' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$Body' => '<p>Provides input data, in the format specified in the <code>ContentType</code> request header. Amazon SageMaker passes all of the data in the body to the model. </p> <p>For information about the format of the request body, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/cdf-inference.html">Common Data Formats-Inference</a>.</p>', 'InvokeEndpointOutput$Body' => '<p>Includes the inference provided by the model.</p> <p>For information about the format of the response body, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/cdf-inference.html">Common Data Formats-Inference</a>.</p>', ], ], 'CustomAttributesHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$CustomAttributes' => '<p>Provides additional information about a request for an inference submitted to a model hosted at an Amazon SageMaker endpoint. The information is an opaque value that is forwarded verbatim. You could use this value, for example, to provide an ID that you can use to track a request or to provide other metadata that a service endpoint was programmed to process. The value must consist of no more than 1024 visible US-ASCII characters as specified in <a href="https://tools.ietf.org/html/rfc7230#section-3.2.6">Section 3.3.6. Field Value Components</a> of the Hypertext Transfer Protocol (HTTP/1.1). </p> <p>The code in your model is responsible for setting or updating any custom attributes in the response. If your code does not set this value in the response, an empty value is returned. For example, if a custom attribute represents the trace ID, your model can prepend the custom attribute with <code>Trace ID:</code> in your post-processing function.</p> <p>This feature is currently supported in the AWS SDKs but not in the Amazon SageMaker Python SDK.</p>', 'InvokeEndpointOutput$CustomAttributes' => '<p>Provides additional information in the response about the inference returned by a model hosted at an Amazon SageMaker endpoint. The information is an opaque value that is forwarded verbatim. You could use this value, for example, to return an ID received in the <code>CustomAttributes</code> header of a request or other metadata that a service endpoint was programmed to produce. The value must consist of no more than 1024 visible US-ASCII characters as specified in <a href="https://tools.ietf.org/html/rfc7230#section-3.2.6">Section 3.3.6. Field Value Components</a> of the Hypertext Transfer Protocol (HTTP/1.1). If the customer wants the custom attribute returned, the model must set the custom attribute to be included on the way back. </p> <p>The code in your model is responsible for setting or updating any custom attributes in the response. If your code does not set this value in the response, an empty value is returned. For example, if a custom attribute represents the trace ID, your model can prepend the custom attribute with <code>Trace ID:</code> in your post-processing function.</p> <p>This feature is currently supported in the AWS SDKs but not in the Amazon SageMaker Python SDK.</p>', ], ], 'EndpointName' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$EndpointName' => '<p>The name of the endpoint that you specified when you created the endpoint using the <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/API_CreateEndpoint.html">CreateEndpoint</a> API. </p>', ], ], 'Header' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$ContentType' => '<p>The MIME type of the input data in the request body.</p>', 'InvokeEndpointInput$Accept' => '<p>The desired MIME type of the inference in the response.</p>', 'InvokeEndpointOutput$ContentType' => '<p>The MIME type of the inference returned in the response body.</p>', 'InvokeEndpointOutput$InvokedProductionVariant' => '<p>Identifies the production variant that was invoked.</p>', ], ], 'InferenceId' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$InferenceId' => '<p>If you provide a value, it is added to the captured data when you enable data capture on the endpoint. For information about data capture, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/model-monitor-data-capture.html">Capture Data</a>.</p>', ], ], 'InternalFailure' => [ 'base' => '<p> An internal failure occurred. </p>', 'refs' => [], ], 'InvokeEndpointInput' => [ 'base' => NULL, 'refs' => [], ], 'InvokeEndpointOutput' => [ 'base' => NULL, 'refs' => [], ], 'LogStreamArn' => [ 'base' => NULL, 'refs' => [ 'ModelError$LogStreamArn' => '<p> The Amazon Resource Name (ARN) of the log stream. </p>', ], ], 'Message' => [ 'base' => NULL, 'refs' => [ 'InternalFailure$Message' => NULL, 'ModelError$Message' => NULL, 'ModelError$OriginalMessage' => '<p> Original message. </p>', 'ServiceUnavailable$Message' => NULL, 'ValidationError$Message' => NULL, ], ], 'ModelError' => [ 'base' => '<p> Model (owned by the customer in the container) returned 4xx or 5xx error code. </p>', 'refs' => [], ], 'ServiceUnavailable' => [ 'base' => '<p> The service is unavailable. Try your call again. </p>', 'refs' => [], ], 'StatusCode' => [ 'base' => NULL, 'refs' => [ 'ModelError$OriginalStatusCode' => '<p> Original status code. </p>', ], ], 'TargetContainerHostnameHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$TargetContainerHostname' => '<p>If the endpoint hosts multiple containers and is configured to use direct invocation, this parameter specifies the host name of the container to invoke.</p>', ], ], 'TargetModelHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$TargetModel' => '<p>The model to request for inference when invoking a multi-model endpoint.</p>', ], ], 'TargetVariantHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$TargetVariant' => '<p>Specify the production variant to send the inference request to when invoking an endpoint that is running two or more variants. Note that this parameter overrides the default behavior for the endpoint, which is to distribute the invocation traffic based on the variant weights.</p> <p>For information about how to use variant targeting to perform a/b testing, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/model-ab-testing.html">Test models in production</a> </p>', ], ], 'ValidationError' => [ 'base' => '<p> Inspect your request and try again. </p>', 'refs' => [], ], ],];
