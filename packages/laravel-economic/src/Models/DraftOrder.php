<?php

namespace LasseRafn\Economic\Models;

use GuzzleHttp\Post\PostBody;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use LasseRafn\Economic\Exceptions\EconomicClientException;
use LasseRafn\Economic\Exceptions\EconomicRequestException;
use LasseRafn\Economic\Utils\Model;

class DraftOrder extends Model
{
	protected $entity     = 'orders/drafts';
	protected $primaryKey = 'orderNumber';
	protected $puttable   = [
		'orderNumber',
		'date',
		'currency',
		'exchangeRate',
		'netAmount',
		'netAmountInBaseCurrency',
		'grossAmount',
		'grossAmountInBaseCurrency',
		'marginInBaseCurrency',
		'marginPercentage',
		'vatAmount',
		'roundingAmount',
		'costPriceInBaseCurrency',
		'dueDate',
		'paymentTerms',
		'customer',
		'recipient',
		'delivery',
		'notes',
		'references',
		'project',
		'lines',
	];

	public $orderNumber;
	public $self;
	public $pdf;
	public $name;
	public $dueDate;
	public $date;
	public $currency;
	public $recipient;
	public $project;
	public $grossAmount;
	public $netAmount;

	/** @var Customer */
	public $customer;

	/** @var \stdClass|array */
	public $notes;

	/** @var Layout */
	public $layout;

	/** @var PaymentTerm */
	public $paymentTerms;

	/** @var array */
	public $lines;

	/**
	 * @param string $description
	 * @param int    $quantity
	 * @param        $product
	 */
	public function addLine( $description, $quantity, $product ) {
		$line = new \stdClass();

		$line->description = $description;
		$line->quantity    = (float) number_format( $quantity, 2 );
		$line->product     = $product;
		if ( $product !== null ) {
			$line->unitNetPrice   = $product->salesPrice;
			$line->unitCostPrice  = $product->costPrice;
			$line->totalNetAmount = $quantity * $product->salesPrice;

			if ( isset( $product->unit ) ) {
				$line->unit = $product->unit;
			}
		}

		$this->lines[] = $line;
	}

	/**
	 * Documentation: https://restdocs.e-conomic.com/#get-orders-drafts-ordernumber-templates-upgrade-instructions-draftinvoice
	 */
	public function upgradeToDraftInvoice() {
		$id = $this->orderNumber;

		try {
			$upgradeInstructions = $this->request->curl->get( 
				sprintf('orders/drafts/%d/templates/upgrade-instructions/draftInvoice', $id)
			)->getBody()->getContents();

			$upgradeInstructionsData = json_decode( $upgradeInstructions );
			$draftInvoice = $upgradeInstructionsData->draftInvoice;

			$responseData = $this->request->curl->post( 'invoices/drafts', [
				'json' => $draftInvoice,
			] )->getBody()->getContents();
		} catch ( ClientException $exception ) {
			$message = $exception->getMessage();
			$code    = $exception->getCode();

			if ( $exception->hasResponse() ) {
				$message = $exception->getResponse()->getBody()->getContents();
				$code    = $exception->getResponse()->getStatusCode();
			}

			throw new EconomicRequestException( $message, $code );
		} catch ( ServerException $exception ) {
			$message = $exception->getMessage();
			$code    = $exception->getCode();

			if ( $exception->hasResponse() ) {
				$message = $exception->getResponse()->getBody()->getContents();
				$code    = $exception->getResponse()->getStatusCode();
			}

			throw new EconomicRequestException( $message, $code );
		} catch ( \Exception $exception ) {
			$message = $exception->getMessage();
			$code    = $exception->getCode();

			throw new EconomicClientException( $message, $code );
		}

		$responseData = json_decode( $responseData );

		return new DraftInvoice( $this->request, $responseData );
	}

	/**
	 * $file is a based from the project root, so "/public/test.pdf" would be a valid value.
	 * $file can also be a string of the pdf file, if $type = 'file'
	 * 
	 * Documentation: https://restdocs.e-conomic.com/#get-orders-drafts-ordernumber-templates-upgrade-instructions-draftinvoice
	 * 
	 * @param string $path
	 */
	public function addFile( $file, $type = 'path' ) {
		$id = $this->orderNumber;

		try {
			$responseData = $this->request->curl->request( 
				'POST', 
				sprintf('orders/drafts/%d/attachment/file', $id), 
				[
					'multipart' => [
						[
							'name' => '',
							'contents' => $type == 'path' ? fopen($file, 'r') : $file
						]
					]
				]
			)->getBody()->getContents();
		} catch ( ClientException $exception ) {
			$message = $exception->getMessage();
			$code    = $exception->getCode();

			if ( $exception->hasResponse() ) {
				$message = $exception->getResponse()->getBody()->getContents();
				$code    = $exception->getResponse()->getStatusCode();
			}

			throw new EconomicRequestException( $message, $code );
		} catch ( ServerException $exception ) {
			$message = $exception->getMessage();
			$code    = $exception->getCode();

			if ( $exception->hasResponse() ) {
				$message = $exception->getResponse()->getBody()->getContents();
				$code    = $exception->getResponse()->getStatusCode();
			}

			throw new EconomicRequestException( $message, $code );
		} catch ( \Exception $exception ) {
			$message = $exception->getMessage();
			$code    = $exception->getCode();

			throw new EconomicClientException( $message, $code );
		}

		return true;
	}
}
