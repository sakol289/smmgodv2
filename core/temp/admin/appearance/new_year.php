<style>
	.new-year__container {
		border: 1px solid #ddd;
		-webkit-border-radius: 8px;
		-moz-border-radius: 8px;
		border-radius: 8px
	}

	.new-year {
		position: relative;
		margin-bottom: 16px;
		margin-top: 16px
	}

	.new-year__preview-empty {
		background: #f8f8f8;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-align-items: center;
		-moz-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-justify-content: center;
		-moz-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		z-index: 10
	}

	.new-year__preview-container {
		overflow: hidden;
		position: absolute;
		height: 100%;
		width: 100%
	}

	.new-year__fake-navbar {
		position: relative
	}

	.new-year__container {
		border: 1px solid #ddd;
		-webkit-border-radius: 8px;
		-moz-border-radius: 8px;
		border-radius: 8px
	}

	.new-year__body {
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-align-items: stretch;
		-moz-box-align: stretch;
		-ms-flex-align: stretch;
		align-items: stretch;
		padding: 22px
	}

	.new-year__body-settings {
		width: 300px;
		-webkit-flex-basis: 300px;
		-ms-flex-preferred-size: 300px;
		flex-basis: 300px;
		-webkit-flex-shrink: 0;
		-ms-flex-negative: 0;
		flex-shrink: 0;
		padding-right: 24px
	}

	.new-year__body-preview {
		min-height: 647px;
		background: #34363a;
		position: relative;
		width: 100%;
		overflow: hidden
	}

	.new-year__settings-form {
		padding-top: 16px
	}

	.new-year__settings-group {
		padding-bottom: 16px;
		padding-top: 16px;
		border-bottom: 1px solid #e6e6e6
	}

	.new-year__settings-group:first-child {
		padding-top: 0
	}

	.new-year__settings-group:last-child {
		border-bottom: none;
		padding-bottom: 0
	}

	.new-year__settings-row {
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-align-items: center;
		-moz-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		margin-bottom: 8px
	}

	.new-year__settings-row-label {
		-webkit-flex-shrink: 0;
		-ms-flex-negative: 0;
		flex-shrink: 0;
		width: 80px;
		color: #777;
		font-size: 12px
	}

	.new-year__settings-row-options {
		width: 100%
	}

	.new-year__settings-row-options .btn-group .btn {
		border-right-width: 0
	}

	.new-year__settings-row-options .btn-group .btn:last-child {
		border-right-width: 1px
	}

	.new-year__settings-row:last-child {
		margin-bottom: 0
	}

	.new-year__header {
		position: relative;
		border-bottom: 1px solid #ddd;
		background: #f8f8f8;
		height: 55px;
		-webkit-border-top-left-radius: 8px;
		-webkit-border-top-right-radius: 8px;
		-moz-border-radius-topleft: 8px;
		-moz-border-radius-topright: 8px;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-align-items: center;
		-moz-box-align: center;
		-ms-flex-align: center;
		align-items: center
	}

	.new-year__header-description {
		font-weight: 700;
		padding-left: 110px
	}

	.new-year__header-snowman {
		position: absolute;
		left: 19px;
		bottom: 0
	}

	.new-year__header-snowman img {
		display: block;
		max-width: 67px
	}

	.new-year__footer {
		border-top: 1px solid #ddd;
		padding: 16px;
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-align-content: center;
		-ms-flex-line-pack: center;
		align-content: center
	}

	.new-year__footer .btn-primary {
		margin-right: 8px
	}

	.new-year__footer-deactivate {
		margin-left: auto
	}

	.toys-select {
		width: 100%
	}

	.toys-select__label {
		color: #888;
		font-size: 12px;
		margin-bottom: 8px
	}

	.toys-select__options {
		margin-bottom: 2px
	}

	.toys-select__options-row {
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-flex-wrap: wrap;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap
	}

	.toys-select__options-row:last-child {
		margin-bottom: 0
	}

	.toys-select__options-item {
		position: relative;
		border: 1px solid #e7e7e7;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		width: 41px;
		height: 41px;
		display: -webkit-flex;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-align-items: center;
		-moz-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-justify-content: center;
		-moz-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		margin-right: 6px;
		cursor: pointer;
		margin-bottom: 8px
	}

	.toys-select__options-item img {
		display: block;
		max-width: 28px
	}

	.toys-select__options-item-active {
		border: 1px solid #337ab7;
		-webkit-box-shadow: 0 0 0 1px #337ab7;
		-moz-box-shadow: 0 0 0 1px #337ab7;
		box-shadow: 0 0 0 1px #337ab7
	}

	.toys-select__options-item-disabled {
		-webkit-filter: grayscale(100%);
		-moz-filter: grayscale(100%);
		-ms-filter: grayscale(100%);
		-o-filter: grayscale(100%);
		filter: grayscale(100%);
		-webkit-filter: grey;
		filter: gray;
		opacity: .8
	}

	.toys-select__options-item:last-child,
	.toys-select__options-item:nth-child(6n) {
		margin-right: 0
	}
</style>
<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<style>
				.new-year__event {
					position: relative;
					padding-bottom: 16px;
					margin-bottom: 15px;
					border-bottom: 1px solid #E8E8E8;
				}

				.new-year__event-wrapper {
					position: relative;
				}

				.new-year__event-snowman {
					position: absolute;
					bottom: 0px;
					left: 18px;
				}

				.new-year__event-snowman img {
					display: block;
					max-width: 67px;
				}

				.new-year__event-body {
					background-image: linear-gradient(90deg, #E7E7E7 0%, #F8F8F8 100%);
					border-radius: 4px;
					height: 55px;
					overflow: hidden;
				}

				.new-year__event-actions {
					position: absolute;
					right: 16px;
					top: 11px;
				}

				.new-year__event-description {
					height: 100%;
					display: flex;
					align-items: center;
					padding-left: 110px;
					position: absolute;
					z-index: 10;
				}

				.new-year__event-description span {
					font-weight: bold;
				}

				.new-year__event-snow {
					height: 55px;
					width: 600px;
					overflow: hidden;
					position: absolute;
					left: 0px;
					z-index: 1;
					top: 0;
				}

				.new-year__event-snow svg {
					margin: -15px;
					max-height: 450px;
					width: calc(100% + 30px);
				}

				.dark-mode .new-year__event {
					border-bottom: 1px solid #3f4149;
				}

				.dark-mode .new-year__event-body {
					background: #2d3035;
				}

				@media (max-width: 768px) {
					.new-year__event-snow {
						display: none;
					}
				}
			</style>
			<div class="new-year__event">
				<div class="new-year__event-wrapper">
					<div class="new-year__event-snowman">
						<img src="data:image/png;base64,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" />
					</div>








					<div class="new-year__event-body">
						<div class="new-year__event-description">


							<span>New year decoration --></span>
						</div>

						<div class='new-year__event-snow'>
							<svg fill='none' viewbox='0 0 252 252' xmlns='http://www.w3.org/2000/svg'>
								<path d='M20.5 1L15.2519 8.24732C12.1426 12.5412 12.2536 18.3752 15.5239 22.5477L18.9254 26.8875C21.8053 30.5619 20.5929 35.9536 16.4172 38.0414V38.0414C11.7027 40.3986 10.9078 46.7956 14.902 50.235L16.7227 51.8029C20.8398 55.3482 20.8898 61.709 16.829 65.3187L15.0066 66.9386C10.5287 70.919 10.6409 77.9507 15.2435 81.7862L16.9464 83.2053C20.8422 86.4518 20.7695 92.4587 16.7962 95.6099V95.6099C13.1358 98.513 12.7342 103.923 15.9258 107.334L17.8439 109.385C21.6055 113.406 21.6548 119.64 17.9573 123.72L16.7501 125.052C12.8059 129.404 12.4129 135.911 15.8046 140.707L19.0231 145.257C22.2119 149.765 21.7931 155.894 18.0207 159.926V159.926C13.6026 164.649 13.883 172.068 18.645 176.444L20.5313 178.177C25.2365 182.501 26.4673 189.438 23.5365 195.117L20.5 201' id='Line1'></path>
								<path d='M37.5 1L42.8215 6.53434C46.3688 10.2236 45.2924 16.2991 40.6936 18.545L39.6461 19.0565C34.7857 21.4302 34.4242 28.2199 39.0051 31.0962L40.7006 32.1608C44.6603 34.6472 44.2329 40.5483 39.9562 42.438V42.438C35.4213 44.4418 35.2944 50.8306 39.7462 53.0128L41.174 53.7127C46.2161 56.1844 46.0072 63.4452 40.8504 65.6679V65.6679C35.288 68.0655 35.5724 76.076 41.3103 78.0167L44.4754 79.0873C50.556 81.1439 51.7692 89.2129 46.5623 92.9667L44.2062 94.6653C40.3726 97.429 39.191 102.611 41.4477 106.764L43.7892 111.072C47.3506 117.625 45.54 125.8 39.5448 130.237L34.0495 134.303C29.1484 137.93 28.3296 144.943 32.2634 149.601L38.8066 157.35C41.1207 160.09 39.6111 164.308 36.0836 164.958V164.958C31.9916 165.712 30.8524 171.036 34.2777 173.398L43.8174 179.978C48.9515 183.518 49.3238 190.968 44.5683 195.003L37.5 201' id='Line2'></path>
								<path d='M59.5 1L54.6281 15.6158C53.2213 19.836 55.768 24.3478 60.108 25.3243V25.3243C65.5653 26.5522 67.8163 33.0989 64.2681 37.4233L63.8947 37.8784C60.2266 42.3488 62.4643 49.1161 68.0744 50.5186L68.5016 50.6254C74.9612 52.2403 76.8691 60.4964 71.773 64.7818L70.7684 65.6265C66.3373 69.3527 66.6327 76.264 71.3656 79.5985L72.0355 80.0704C77.6479 84.0247 77.3103 92.453 71.3996 95.9457L62.0283 101.483C54.5164 105.922 56.6243 117.318 65.227 118.776L66.9594 119.069C75.8732 120.58 77.0949 132.889 68.652 136.123L65.6388 137.277C60.0308 139.424 59.2924 147.058 64.3849 150.241L67.4723 152.17C71.9609 154.976 70.6977 161.827 65.5038 162.847V162.847C60.4476 163.841 59.0647 170.42 63.2931 173.365L71.609 179.156C76.2311 182.375 77.3419 188.745 74.0821 193.339L69 200.5' id='Line3'></path>
								<path d='M91.5 1L88.896 3.60402C85.2599 7.24011 87.3754 13.4673 92.474 14.1359V14.1359C98.339 14.9051 99.7859 22.7337 94.6731 25.7084V25.7084C90.0718 28.3855 90.5987 35.2632 95.6016 37.0824L98.0858 37.9857C103.563 39.9773 104.787 47.1745 100.276 50.8648L98.6577 52.1892C92.7509 57.022 95.5649 66.5848 103.137 67.5398V67.5398C112.122 68.6731 113.65 81.1221 105.148 84.2431L98.0316 86.8555C90.3798 89.6644 92.3947 101 100.546 101V101C108.475 101 110.712 111.868 103.426 114.999L93.1524 119.414C85.8833 122.538 85.3045 132.621 92.1682 136.556L95.5604 138.501C103.292 142.934 103.303 154.083 95.5786 158.53L94.3876 159.216C87.3858 163.248 86.506 173.005 92.6737 178.224V178.224C96.7007 181.631 97.9386 187.318 95.6925 192.091L91.5 201' id='Line4'></path>
								<path d='M119.5 1L122.46 2.55053C129.968 6.48331 129.844 17.273 122.248 21.0321L117.061 23.5985C109.475 27.3528 111.315 38.658 119.701 39.812L127.763 40.9215C133.568 41.7204 134.912 49.5088 129.709 52.2064V52.2064C125.401 54.4402 125.382 60.5959 129.676 62.856L135.641 65.9955C143.355 70.0552 142.02 81.4839 133.578 83.6563L121.628 86.7319C111.891 89.2376 111.256 102.825 120.717 106.227L127.208 108.562C133.865 110.956 133.972 120.332 127.371 122.878V122.878C121.221 125.25 120.761 133.775 126.62 136.796L131.188 139.152C136.882 142.087 137.543 149.968 132.418 153.811L126.85 157.987C123.701 160.349 124.445 165.266 128.153 166.59V166.59C132.444 168.123 132.548 174.153 128.312 175.833L119.613 179.283C115.173 181.043 113.068 186.127 114.964 190.511L119.5 201' id='Line5'></path>
								<path d='M154.5 1L147.419 16.8475C145.5 21.1417 147.269 26.187 151.448 28.3442V28.3442C155.867 30.6247 157.546 36.092 155.171 40.4601L148.691 52.3751C146.118 57.1051 147.944 63.0253 152.734 65.4849V65.4849C157.901 68.1381 159.54 74.7396 156.216 79.5021L149.86 88.6057C146.976 92.7377 148.983 98.4813 153.813 99.9174V99.9174C158.298 101.251 160.43 106.364 158.22 110.489L152.177 121.77C149.33 127.084 149.863 133.572 153.538 138.35L156.64 142.382C159.915 146.64 159.25 152.723 155.133 156.172L152.609 158.287C148.452 161.77 149.147 168.382 153.879 171.032V171.032C159.658 174.269 158.992 182.89 152.718 185.015V185.015C146.707 187.051 145.649 195.1 150.93 198.62L154.5 201' id='Line6'></path>
								<path d='M167.5 1L171.772 7.02022C175.936 12.8866 176.654 20.528 173.657 27.0673L170.632 33.6673C168.768 37.7339 169.758 42.5396 173.078 45.538L175.698 47.905C179.38 51.2305 178.901 57.1444 174.732 59.834V59.834C170.902 62.305 170.124 67.5834 173.078 71.0545L178.608 77.5516C182.111 81.6683 179.186 88 173.78 88V88C168.208 88 165.346 94.6718 169.187 98.7089L172.068 101.738C175.468 105.313 174.928 111.067 170.922 113.947L170.156 114.497C165.993 117.489 165.187 123.359 168.39 127.362L171.718 131.522C175.71 136.513 175.821 143.573 171.986 148.685L167.311 154.918C162.933 160.757 164.763 169.122 171.18 172.597V172.597C177.471 176.005 179.379 184.14 175.258 189.989L167.5 201' id='Line7'></path>
								<path d='M185.5 1L182.564 23.3857C181.893 28.5015 183.638 33.6384 187.287 37.2868V37.2868C192.219 42.2189 193.543 49.7074 190.602 56.0317L189.142 59.1697C186.804 64.1957 186.493 69.9291 188.272 75.1787L192.464 87.5451C194.376 93.1833 193.525 99.392 190.168 104.308L186.144 110.2C183.437 114.163 183.877 119.48 187.197 122.945V122.945C190.565 126.459 190.963 131.87 188.146 135.839L178.292 149.725C174.486 155.088 176.44 162.586 182.38 165.41L186.855 167.537C192.889 170.406 193.058 178.932 187.142 182.038V182.038C183.831 183.776 182.139 187.554 183.046 191.182L185.5 201' id='Line8'></path>
								<defs>
									<radialgradient cx='50%' cy='50%' fx='50%' fy='50%' id='radialGradient-1' r='72.4736449%'>
										<stop offset='0%' stop-color='#fff'></stop>
										<stop offset='100%' stop-color='#fff'></stop>
									</radialgradient>
									<filter filterunits='objectBoundingBox' height='262.5%' id='filter-3' width='262.5%' x='-81.2%' y='-68.8%'>
										<feoffset dx='0' dy='1' in='SourceAlpha' result='shadowOffsetOuter1'></feoffset>
										<fegaussianblur in='shadowOffsetOuter1' result='shadowBlurOuter1' stddeviation='2'></fegaussianblur>
										<fecolormatrix in='shadowBlurOuter1' type='matrix' values='0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.5 0'></fecolormatrix>
									</filter>
								</defs>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='12s' dur='17s' repeatcount='indefinite'>
										<mpath xlink:href='#Line5'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='9s' dur='19s' repeatcount='indefinite'>
										<mpath xlink:href='#Line6'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='11s' dur='20s' repeatcount='indefinite'>
										<mpath xlink:href='#Line6'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='3s' dur='13s' repeatcount='indefinite'>
										<mpath xlink:href='#Line6'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='7s' dur='12s' repeatcount='indefinite'>
										<mpath xlink:href='#Line6'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='20s' dur='19s' repeatcount='indefinite'>
										<mpath xlink:href='#Line5'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='21s' dur='21s' repeatcount='indefinite'>
										<mpath xlink:href='#Line2'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='6s' dur='17s' repeatcount='indefinite'>
										<mpath xlink:href='#Line3'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='2s' dur='22s' repeatcount='indefinite'>
										<mpath xlink:href='#Line5'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='5s' dur='13s' repeatcount='indefinite'>
										<mpath xlink:href='#Line2'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='5s' dur='20s' repeatcount='indefinite'>
										<mpath xlink:href='#Line4'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='4s' dur='22s' repeatcount='indefinite'>
										<mpath xlink:href='#Line7'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='9s' dur='11s' repeatcount='indefinite'>
										<mpath xlink:href='#Line3'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='10s' dur='19s' repeatcount='indefinite'>
										<mpath xlink:href='#Line2'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='9s' dur='20s' repeatcount='indefinite'>
										<mpath xlink:href='#Line5'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='9s' dur='19s' repeatcount='indefinite'>
										<mpath xlink:href='#Line2'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='0s' dur='11s' repeatcount='indefinite'>
										<mpath xlink:href='#Line8'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='8s' dur='12s' repeatcount='indefinite'>
										<mpath xlink:href='#Line3'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='18s' dur='19s' repeatcount='indefinite'>
										<mpath xlink:href='#Line4'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='17s' dur='13s' repeatcount='indefinite'>
										<mpath xlink:href='#Line7'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='9s' dur='17s' repeatcount='indefinite'>
										<mpath xlink:href='#Line7'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='2'>
									<animatemotion begin='19s' dur='12s' repeatcount='indefinite'>
										<mpath xlink:href='#Line5'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='7s' dur='16s' repeatcount='indefinite'>
										<mpath xlink:href='#Line1'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='20s' dur='17s' repeatcount='indefinite'>
										<mpath xlink:href='#Line7'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='16s' dur='10s' repeatcount='indefinite'>
										<mpath xlink:href='#Line6'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='22s' dur='20s' repeatcount='indefinite'>
										<mpath xlink:href='#Line8'></mpath>
									</animatemotion>
								</circle>
								<circle fill-opacity='1' fill='url(#radialGradient-1)' id='path-2' r='3'>
									<animatemotion begin='12s' dur='10s' repeatcount='indefinite'>
										<mpath xlink:href='#Line8'></mpath>
									</animatemotion>
								</circle>
							</svg>
						</div>
					</div>
				</div>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div id="pop_noti" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">


				</div>

				<style>
					.new_year {
						pointer-events: none;
						opacity: 0.5;
					}

					.new_year:before {
						content: "Currently disabled";
						color: red;
					}
				</style>

				<div class="new_year">





					<div class="new-year__body">
						<div class="form_group">
							<div class="new-year__settings-group">

								<div class="new-year__settings-label">
									<div class="form-group__switch">
										<label class="form-group__switch-form">
											<input name="snow_fall" type="checkbox" id="snow" value="true" <?= $decoration["snow_fall"] == true ? "checked" : null; ?>>

										</label>
										<label for="snow" class="form-group__switch-label form-group__switch-label-snow">Falling snow</label>


									</div>
								</div>
								<div class="new-year__settings-form" id="snow_div">
									<div class="new-year__settings-row">
										<div class="new-year__settings-row-label"><label class="control-label">Snowflakes</label>


										</div>
										<div class="new-year__settings-row-options">
											<div role="toolbar" class="btn-toolbar">
												<div id="snow_count" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
													<div class="form-group">

														<select class="form-control" name="snowflakes">
															<option name="snowflakes" value="20" <?= $decoration["snowflakes"] == 20 ? "selected" : null; ?>>20</option>
															<option name="snowflakes" value="50" <?= $decoration["snowflakes"] == 50 ? "selected" : null; ?>>50</option>
															<option name="snowflakes" value="100" <?= $decoration["snowflakes"] == 100 ? "selected" : null; ?>>100</option>
															<option name="snowflakes" value="200" <?= $decoration["snowflakes"] == 200 ? "selected" : null; ?>>200</option>
															<option name="snowflakes" value="500" <?= $decoration["snowflakes"] == 500 ? "selected" : null; ?>>500</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="new-year__settings-row">
										<div class="new-year__settings-row-label">Fall speed</div>
										<div class="new-year__settings-row-options">
											<div role="toolbar" class="btn-toolbar">
												<div id="snow_fall_speed" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">

													<div class="form-group">

														<select class="form-control" name="snow_speed">
															<option value="3" <?= $decoration["snow_speed"] == 3 ? "selected" : null; ?>>Slow</option>
															<option value="5" <?= $decoration["snow_speed"] == 5 ? "selected" : null; ?>>Medium</option>
															<option value="10" <?= $decoration["snow_speed"] == 10 ? "selected" : null; ?>>Fast</option>


														</select>
													</div>


												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="new-year__settings-group">
								<div class="new-year__settings-label">
									<div class="form-group__switch">
										<label class="form-group__switch-form">
											<input name="garlands" type="checkbox" id="snow" value="true" <?= $decoration["garlands"] == true ? "checked" : null; ?>>

										</label>
										<label for="garland" class="form-group__switch-label form-group__switch-label-garland">Garlands</label>
									</div>
								</div>
								<div class="new-year__settings-form" id="garland_div">
									<div class="new-year__settings-row">
										<div class="new-year__settings-row-label">Shape</div>
										<div class="new-year__settings-row-options">
											<div role="toolbar" class="btn-toolbar">
												<div id="garlands_shape" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
													<div class="form-group">

														<select class="form-control" name="gar_shape">
															<option value="apple" <?= $decoration["gar_shape"] == apple ? "selected" : null; ?>>Circle</option>
															<option value="pear" <?= $decoration["gar_shape"] == pear ? "selected" : null; ?>>Oval</option>



														</select>
													</div>


												</div>
											</div>
										</div>
									</div>
									<div class="new-year__settings-row">
										<div class="new-year__settings-row-label">Colors</div>
										<div class="new-year__settings-row-options">
											<div role="toolbar" class="btn-toolbar">
												<div id="garlands_style" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
													<div class="form-group">

														<select class="form-control" name="gar_style">
															<option value="style1" <?= $decoration["gar_style"] == style1 ? "selected" : null; ?>>Style 1</option>
															<option value="style2" <?= $decoration["gar_style"] == style2 ? "selected" : null; ?>>Style 2</option>
															<option value="style3" <?= $decoration["gar_style"] == style3 ? "selected" : null; ?>>Style 3</option>



														</select>
													</div>


												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="new-year__settings-group">
								<div class="new-year__settings-label">
									<div class="form-group__switch">
										<label class="form-group__switch-form">
											<input name="fire_works" type="checkbox" id="snow" value="true" <?= $decoration["fire_works"] == true ? "checked" : null; ?>>

										</label>
										<label for="fireworks" class="form-group__switch-label form-group__switch-label-fireworks">Fireworks</label>
									</div>
								</div>
								<div class="new-year__settings-form" id="fireworks_div">
									<div class="new-year__settings-row">
										<div class="new-year__settings-row-label">Size</div>
										<div class="new-year__settings-row-options">
											<div role="toolbar" class="btn-toolbar">
												<div id="fireworks_size" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
													<div class="form-group">

														<select class="form-control" name="fire_size">
															<option value="0.95" <?= $decoration["fire_size"] == 0.95 ? "selected" : null; ?>>Small</option>
															<option value="0.97" <?= $decoration["fire_size"] == 0.97 ? "selected" : null; ?>>Medium</option>
															<option value="1.02" <?= $decoration["fire_size"] == 1.02 ? "selected" : null; ?>>Large</option>



														</select>
													</div>


												</div>
											</div>
										</div>
									</div>
									<div class="new-year__settings-row">
										<div class="new-year__settings-row-label">Delay</div>
										<div class="new-year__settings-row-options">
											<div role="toolbar" class="btn-toolbar">
												<div id="fireworks_size" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
													<div class="form-group">

														<select class="form-control" name="fire_speed">
															<option value="slow" <?= $decoration["fire_speed"] == slow ? "selected" : null; ?>>Slow</option>
															<option value="medium" <?= $decoration["fire_speed"] == medium ? "selected" : null; ?>>Medium</option>
															<option value="fast" <?= $decoration["fire_speed"] == fast ? "selected" : null; ?>>Fast</option>



														</select>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="new-year__settings-group">
									<div class="new-year__settings-label">
										<div class="form-group__switch">
											<label class="form-group__switch-form">
												<input name="toys" type="checkbox" id="snow" value="true" <?= $decoration["toys"] == true ? "checked" : null; ?>>

											</label>
											<label for="garland" class="form-group__switch-label form-group__switch-label-garland">Toys</label>
										</div>
									</div>
									<div class="new-year__settings-form" id="toys_div">
										<div class="new-year__settings-row">
											<div class="toys-select">
												<div class="toys-select__label">Choose toys (max 5)</div>
												<div class="toys-select__options">
													<div class="toys-select__options-row">

														<div class="toys-select__options-item <?= $decoration["toy_a"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image1" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_a" id="image1" value="1" <?= $decoration["toy_a"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAL6UExURUdwTLmrpa4+QKWbmqQ8PqqgnsjGxbOOiptbW5cvMfv7+eDi4fhUXJ5HR51aXK+lpJItL8bAwJQxMuA5QsrHxc3JyJM1NfY/SY0vMMrBwZYxM8zExJItL/dBS9vX18PAv/X19M7JycW4uedES6iioO/v7pQ9PspDSKCcmcK9vfTz8pyWk9fU1NnU1K9MTrSvrvU7RWRGRfdBSu9NVenp5uLf3pmRj7qtrfU5RPI9RvU6RZAwMvBMU9w6Q4tDROJRVff29dZfZK2opvU6RPY4Q9Y8Q/1VXNE7Qv///+Hh3qefncOpqvY8RpaOi/iUmrBcXfvP0fpZYtk8RNM/RZ9rasZHTP9PV701OPXz87lPUZVrauFRWKxUVvq1t/iFi7BARLJPUWYtLP85//Lx8PEzP/MzP/Lx8vDw8PI3QvM1QZiYlJggJf///5wkKZceJPQ0QJaWkpkwMpsmKpgiJ5qal+8wPZubmJ4nLJ0zNfPz85mZlfEwPJQsLvQxPu4rOPr4948IE5MmKd8rN5AnKp2dmpQdI5+gnpQoKpOSj/c4Q4oRGePg4JYpLIUID58aIo8YHvP19pYwMoYoKZIhJo+Lh78ZJuogMPQuOv8+SO3s7Keno5ARG6mrp6WjoNvW1vf29dTQ0P/+/o8tL+80P4MhJIshJfT5+tLDxMIaKMILG+fm5ZYOGPoyP6STkqGLiX8oKN/c3PE8RswRIKIeJP5MVHweIP37+9wzPPReZ4orLaBoasmwsfRDTPJMVsYtNb67uveorY1vbKR9ffi4u5tSU+c0Pi4GB56DgoleXZo8P3YLELWyr4U5Oc0uNsOdnptHS/OIj550dP7t7u4iMvRsdPfj5KVvcfeYnZF/fb9pbPrY2r+ChPV6gfrIy9C5usJUV+vo6F4GCfHR1IMvL9UwOb0nL7EqL5VjY4FTUtrOz4NFRbOpqD8KC8lESrIRHJkpLqcnLPUhMdYbKKYyNe9HTr8/RNB5fr2Oj0gkJNVPVONDTHxzcl4wMZ0sMlQvgIwAAABidFJOUwAKJv4aIv4EEfPlFfw2/jbES+X+1+RJpmaR0njYa9nAbqT+WHxQhWzLXoqjwe790rb8ejos7VNf2IXDqeTm4/za/ZzO5cfUoO6u6OWS2d+OkpnTt/aYutPItuHEz5iKzuC0NzxHkwAAD7xJREFUaN612glY02eeB3BuoiIUxVrUqqi1Hqhjvaat01Fn2umx3e7s7uycez1EEiCGy3AlnIlcgUIEBwkkkASkRRITVwE55AoTUlHAC0uhUlFRqeBax7N9nv297/8OKHSe2V/APi3l/+H7e4//a/44Oc2knNe9P9uhti1zd/rba85ry9ctf417BefFOlEyq8qSi7Vr3Kb4tq0zM5bPrhWJyop3BS5mOZ6+w6LksrKyZOIFyrDHeo7wwez3RfB9u9Y5z8QINi9dulSrHBYItn3gy1xlqaiWHSXI7Lqd/gm2rtuFAOWGpUs3mAOmV14LXOvuznP38fX32zBcbP7A15Nsxe+SOUi88szitc4kMVukG14asNbHHcp32WLP6cbjI+bn81nsZ6424zSvvY+bxan44Q0+8KWt694X1W7w9+VR3+e+yWcaZK1mO5tcG1g+vC3A3WnrbFFZUHAQfATjgn8ECZQePk5zlsNXlrJHz8n9w1XTIKvU6zn/7ukbUF69zX/rLp2g2KGqtX7uy3eJ4gN38DjfsX1szzTIDtcPHcI6+y7TDi/dVlythDITn+jDrC33+50oOXAtj/v/89Z4LJ5u0X3oumbSGvMN0Crhmg7l0aIsC9zhOJV461s2TDcmTjs0rmu2T6J9A7XlVQ61YmyZYwoYkD0tZn/PafePVWNq1/WTwswJrPp6ReOKRla5fjyJ4K3aVK4M4E2/GD13fNQy9uF6H57DtvJ14zlOPWr/xOHHc1+1yQMmCW8m24qnu/8Kj5Yzm/bs8EENd3Z29kSL5qNzj75i12Xvueirc6A84Xu279nUolXeDvCZ8RbpvnjB7dtajwV+y5b5LYDyCwzw/+irh1+ya+Mf9lBf9du0aYGHWWne4O/jOfN92P2TP412tRkby7VmqpS3v/ry6u6rRG28uvGvG23p6rEzZ1paPDxgpp0xPru1efN/vzKjy3vy3Fy2bPnj3XvZX3wD9f2tNpP6DFzHw6Pl3O67uP5K1K1nz64UZmZmFj7r2vz4W1zfnOxePdfFjfe8HdLZZcvKV9/49cJ/e+89L68TzQ+ePn2y++HDR+caq7TVgrLkWqiyrx9etUfK9PpTp/R2a7u6tLQUkpw5M6YxmvoavK09dnvPRqj/+tPvf/+bT15fucWFxzSP9ypceqcX1An0ceKE12B/x8Cl82XJOti/RTqdTqQrG9bCuriy+fFfcD1+vPnZFaMr1S2zsroaNgRtVeOjL6/evfvkyZOfo9q5c+cfF765BSMLD6M6QVf9gAiXDn765Nqy4aoxW9fm7x9/+xeH+vbx95tvtRlXaBEBNYz+UFZdfPCg+QHU0/nz666fPXv2t/j++cuamix4Ha7B1uETAyKdiCydbsUt1G8YnS9Sjo5DHU3Jzf0CCv3xDVHfdzVWK9Hc0Gq15Vpt1e46dPHTN27cvHnzu+++s7+MkfDw8L17axLDE4GqqWkVMaVrzE35dPyzs2mdBktTk4V/4c/37x+/f/z48fvX6+AHratLu37//mfj4w+VWnJrgxlyjrj4d3FxdnjFzULLyemn4UztTWwaYCHmexfIXjZBZdUU/S9VReEW9J+aLJbOzrT7pxu15XgGohqzRsYxZaeQkBBaKarHM6lWh0p0+fOarMNM1ZBVVCSVdHbOp9py4+b4RhJAs620QcZC4ma5IOQXHOTiEXRrxbdxUbH+8wtFiUWJcN2sw5RWY2AufvPmvXv3YmPFR8VjcH2Y06VqtUbTp4+MI8PYaSSELBKJx5Wfn197O/v4Bak0cS9UIqrwmqysw03Xb+Bro6vHxv4Ar7ADR4+2l8LVNenp6QqFok2viqQ7Zp+HkbdIgoUE488jX+cev5Ak5e9lVSK/87P/iSXrB/yKjS45evSymgAUMTExbadYSBwHIbIkXjwSTBWN8JHDJzB+GoMQFRWGEE06IcTs3992CkWhWjYPr5OfhLCqiEYEAgohDFJhI0QSjDQwRkLbiF6FFcyQSLgjEhQkCBIIBPk0AtfnoyxImipJCkIIYn8Cg6jgRSHCyQgYwRyEKQ4CIzLBQrCR0HaQQFDDIklkIbq4UCikEZRCQCeRTInsI5WJ2KgoMUZoIxQjqkjkQJIlUyD1+ahbwfB6PrIvdt8+iolikP2oEkJREqzghnEQsl2JgAiYJJ//eUoEE1EIgM9oFoKCRAAiY6Iswsg/sGdXYn18MJHjhQhULBJioyaiog9wkVAKwcNCIVlCIgvqWGJ9ECtJNiBSydRIFJEjikAuYyQBJxmdPonAAXEwDBSCFdwuEqGCRHSxkkTGLcLnsDezQsgkeOCL4+nZVfVChFDYSIIDoorjIqhVQpykOF7wd0BkdJKXMPJGFmsO870uOSKS5yH7WEgfg2Q+BxGSzRKGJHKQvBchUVEvQFQOyKtZ5CJBHQMkn0Lib1c+v11R3Ha1k0joc5KwkZDEZibJCxGHdrWzktyaCqG2FPTn3uaB/BkinHa1K2LIIBFsRCVTEYjLr85er6vrNGAp0QG5MMPZhRBymWBEJZPJ5PLKioqXXiHOqm4/g5PB6dNAdXYamq/RSLBWPuN22RRkszBysPJgRcUxVCPUOd/tl1lCQ2cnIT2ZMcJuV4mN1a47J48RwEj3iJ5C5uzMQsMiFBoMnWnzWYhZ/8J2sZKUmBTU5AotvIMBOPuPmvpm0cg/IgSvlHCvQTaiGn9huwgmOi87N9vEtAuQgyDo9VaFRuHtgEBJ68+LgoJoRNmdAgdhNFTPGfjo6ILKyoqTcPimkQiUBBv6PjiK/etkhA+n7Xw2kvv5fRgoalIYmK0eLl8Ac+ck1BffAGKkkQgCgUls4yDvUUhIh0hHd0sQXN1tf2hJkpBzgqTSDoWhHx9fnygwso3sJAchiEyvgiSuVgrx/CkriY6VpHrUVj1kScJdMnTW1WHpppi8/rGKioqRLuvB7NzcXBIJxUm6MSKTeavVzMAziPQivP+Gj0O4hq+YlKJe1tBLktKu3zh68iRcvqISSm9LTx/NzqaRBA6isnqrZr1M/a2RRkIsHaIjdBLBsA2QDgmzDzf39zenHToAly+ASi3whiO2TZ6bm5LnOkUSWU6OjEF+QSFCftNFZgoLihEyhA0DNMwAP4Ju4OmhTwtwpUZntMPQmvQYieEgcozIZJFTIUJ+UccRBumzUUmAMEhggotqWw99GhaNqyAHzR9bQTaNEO0aAUROINwkIRYLHzeMjQT3jCrP1+MxAYMvvQiI7tqNT8NIJaqvVKNpKMlOSTmAkdBQLjIhm2CQt7KETR0Dg1gpamUGJb8nZXcz3BolqFl8Ionu2mlASKVHU2pS5QFSwG4XIHp5hmOSt7KkvSLR+XopgdCzK9+achzdfyW4WzAmQwj5jE4SHWa3qg4gJJWV5MrIqVHTqCxjEpKE/mLdTyMkQyFEuyAM9Ku2F43JPlIRiw8Akp2SQyERgBzrilEY7SQyl0J+QiAdFkCSWpnVmG/NJREiCTSsfzDtEJMEMRiZULCQkSsxivSeyYh0EN6f78Bj0s9M4XzvXLJdxMgbDFKJJA3PrjAOUmJNZ7Wru3C/QtGTAauEiwhRuwdRu6RTIHwpjDoZxoCThHGQErsxfT+FZGLEZM/I4SZZmCXkN7f2W0IckzSQSZpbW5ulHEQsDmOQvAZXBoF2tSkUoxkZshxHRLhXKiW2r974IEfEMCTSDT3gM0h03OWGiTAaqbTRCIxJ27HuUW9ZBiQBhXirgEKokvYGM8hljCQ1o5U+KGGQOGNp6WWMhCGkwAE5KJfLAUE1NVLUGxzsiODtpINJEt0Ab3AYf0DjH0a3K4GLoCg5Khbya3aSwSBHRNJ0iYtEGRESRyMlOe2TkIyMDFWDycog/87aIPlspJ1A0Cqq7WfaNYGRCRpJSelRxFBGJo2MqtWmeTTyT818ChlsbRVMQiRNQ7oBLwaJMgHSIEYz2QEJZSEqk1pjfIdBmujTSrKolrlp5X9Fzi6ppb6Zz5pdVnWpKRItFhpJp8c9ootA5HZXDRv5D/r2Owh9CWaQRyRikEg5izG6xzsyLIydhBwT1C6MQLcQYmPa9SZ9kOAgxfmPKu8mYYRVeDGKxZRBIFZm4DO7KnCSVFV7qat1ntskRFpfCwjdr/hzfdoOw1QIXZETDEIOPIGkZqTaG6w5S2jkDUAsxEECtjAGCV5xRQunFcPzkOhob6PJTiGhXASUglQHhOyXV8cAM/AYGWL2RrgDE7swVXBnVPchxJuF3KIQKMckBkIR1l8K5iDnGYQ8EtEI3ONhKcinQlInIfC3Rrg6sVb4zQ7IJQZBR6KhpyzEBAicVl6ALGIj/N6BfiEO84CFNHZpRf1Mt7yoIxFZEyZ4hxa3q4FAIgikEs59UyGw0dbim5awiY1kP+w14LMKaha/nj4SkQPfUKo22lkITnKn4pR11D4Fwr+YLBIN4RlmYSHEe1HMkFyij0R4jYRF9rX3HCAQesED0qVI75MRyEv0Y7SVBHIeb2GWAUeEVoQdxJGIWYlicjFykJFCRbpJhaNwECHazUnkGoNUcZIY+F4DouRezmIkj0SX08lNJSIzs/tOBImkZkxwEEOvjjgSCYXXqLckioNvcxGDpLl3kLvicZKSkvZ0Kgict+8kKNJtMjy/uEmEwt5WL2ISD9HvewhuU+2i9kdJUhJCxBwkr6RHo6C7VdjdnZmusBZghJVkiwUyGKh7SgeTREslqa9nbytiPBx0u/Iq2zESQSIVo7bRVKJy3qafnXmufPdn8y2kYehgkpgJRNKbfL6fjYjF8EYtjZTojZoYyoBjV0WlvgCtE9msJatd2I8AXV7/1T+TTisgxfglMJ/E7bLA06HkixJWkh6TzS6m28Ug8NzxyggsxgK5fN7bq+dOfuDIm/v6v0Cg8F74HQL0AYqyAiNofdS2spLYNaWl7dQszss70K7ZH4oFeLbZNiKXz3pp9ctu8ER46meabit/8+5ueKQ3jH9BQaA8SCfRDTFINNoYjZFoaMLwwNuN+zFRCNW15O1X5k73CNjZxR+e+BKQsnscjwk6rQwx9/gcI0ImiPFHg7LPFkoIhYUfz3Wb2fPfxX7wvBBByp7xC+gOD/2q7eWzj0RqdTuaYCTyg40gMjPXz/xR+RzfAD8PeDZpbh/H90WJV3+vhdWu9tJSTY8YT2OEiO2ZCIhYs+rHPCrHvxbhv2xBeYv+xnzYswwSCfu0IrYbjd5444IsBfLKU30RER+v/7EC6pkn/D6Cr/+ad975T1hE6L0w9jqZmMBEdMasJYvmvfMHiOD+owUKQol45CJCb1IyixGqIBUtBU9Pd3dnJ6e/leBwbngRoUAYiZbPY5bC3wOg+weB3p3fef2GWA5LwcXp/614Lq//dtHqubwf+33/B7Je1Bq9ek/vAAAAAElFTkSuQmCC" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_b"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image2" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_b" id="image2" value="1" <?= $decoration["toy_b"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_c"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image3" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_c" id="image3" value="1" <?= $decoration["toy_c"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_d"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image4" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_d" id="image4" value="1" <?= $decoration["toy_d"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAL3UExURUdwTPLx8vJRWPg/SqBqa/f19qhVV/J4f6eBfLGUkZ+amZqKh/xIU/Y9R+/x8dlAR/EtOtbZ25ZPT5iXkfBJU5iIhfPz8ulvd6Wgn+trbayrquRHT5lXV/Ty8rdaWvPu75WTju99f5lSU8rExJlXWJ5NTvXu7/Pa2uvU1vRQWZuZlevi4vj5+K2inbz//5hfXfNRWfSDiKaemZqDgZaWkfBQV/TO0PrMz+xWW/awspiLivxnbP9WW/WEi/1ocbdPVvZeZZpWV553dqpfX5d2dKNcW/ZgZulgY+tOVfSaoPV6gfdQVvZTWvdeZPRbYu3v7/r5+bddXrGVk5pSUZuGgufLzcxQU/j19PuWm9lbXaKemtdNUtRDSP9mbJlTU55rafG3uaOjoaSjnvKorJI5OvL39pI0NZIrLslITJY/P/nc3/X19YuLh5mTj7dPU7hTVPz8/P7+/bxLT8e7uat1ddze3tvf3sBHS+WKj8KKivG/vZ6embRNTvKeoZRkYvRuc/P19vf398ZcX7OsqOuanfv7+fv29v8SK/8NHc8I0KXNL80LIaUIGM7NzuEfL9cRJcEGHdbW2KWmpODg4fA1QeowPbIFGZpLSp2bmMDAwbUEGejn6e/v8LOxsdAPJJWQjZ8rMMUIH7W1tegtOu7s7JmZk5hAQaCfnMrJys/Q0ckJH9kWKdTR0qAwNPLz87EqMpomK8ADG8HExJ6KiNzb3Pr7/LU0PdNoc+AaK56SkJKIhuJYYcwGHp1SUpyAfpYMF+Pl5tYcLc8zQMQuOPFdZrsUI72Jj/A4Q8QSI97CxbMRIeoqN5toZ+UzPsIdLOEvPOU7RtcvO/f397skLc+zt8yXm+jr7ZN7eeWPlc4eL+zh4u27vv5eZ/tzespGU8hyerJscJpvbsGqrLsFG89caJdhX40UG5EhJ+AnNdokM7Gam/2Ah/0xP7JCRaM9RMK2t7EdKNulqdIUJ6VcYq5gZv+FjcFXYL0pNaUUIqx4feOxtc2prfwgMnmnZdYAAADudFJOUwAPsfoM+RIPBwMPHf75Ef76/1tw+Zuy+/4W/v3StjCvPyWF+49O+a/8+7RLaEwUR7W0M2Omt/n/iPooN/v7/v5yxXkbmXizR8r++rjdpWQe5miYrMZ5ts1zWO3K/NCXx7OD0rLDteH81HX85Ojz4JmBqafc55LPxvTjts/VtqSy3LvO2dnPO7fG/f/////////////////////////////////////////////////////////////////////////////////////////////////////////////+/////////////////////v6B4r5NAAAGu0lEQVRo3rXZZ1STVxgH8FhGiARjFWVZkKIyBBWwyBBpLUMoIO496qit1tW9d/0SoklACBCSMEIAQ5AVCCEpI4DsIXtP2chQcX3ofd83Hk81Ofa8cJ+vOSe/PM+9773/JATC/y/SzmtXrv4dFHThgOU+NyMSAULttL0alJWVVV8vAsW2+ivgEHGhCfODxzrIZIV7e5uIHY+Wi3RHoNFCEsRA//Hnz8c1yGRrg6dt+SGg8vPbpSZHDi3c0MwDyOPj5I7Ozk6FwqTWoCwTq2mpyVHnhWrG59jWcfK2sbFOhUnNSEHBDKWBgVU2hULZb7ogzbgd20ruGHvYqagdmeFQQeUVPqMlCYVCRkNhHYXy6UIobt5bydsejilqC2aoyTF3kIrpaqDRaElJtGxOa2HhAijmAYjRqT/CSY6hFxffBTV3t7rbIjERMI2t1Naiom8/nKdh5NxB7ng4JqUUVlcXl09NpSI1N1fUmAiUpIbCvOQ71UVfaM7LIAX6kztctlgJEyOiR5/MTqbweLwUwNx9dB90QqN15YEJFot36cxrQT7q8D2fFcVIjIg1ZgpYEnmlbGJiQixOFTdaIPMaoKJDvOQ6n4fQ2W9LPWpEM1lcLlfCOrV7+y6vyz9NiHtAK0nCbA41mU4vT909j1bc7LdkZbEzaaiRy71oY6eL7CSS9tr9Hn0WNCEDQWLSIqe+csC9w3QOOoHzMF+YHmsMjNy9jotfvrTre4tEgIAnJyatv7znY9ytmFtq1YuaMsGwBM2DslUb//NGdl8iSAFA6P1hD04txousP1AvYucz0qOfJAwNfbL2lQ+73kIolIJDIBlBDO1wzmuRbVA9OyqEViIO/ufeuc+0X319H6PMpAZppT+sh4l3XkuuaIni88u6i4Fx74zp69fYN9O1NaCVmP7yDGMbnPPaaVbPbiobuBMJkKHXGyEQvv6upmr4Fic5TWzI/FEX37yu/S5il0lnYsIA8tqKoKtiEIchPUzmYVcSznUXWRmMcBBk6Iyqo9bcP+5mXA4nr2iUacjC+aTY/hbfUnULRc7tUXVwGO1YCpAb1JJYpkCwGidyoV3/OoYk/KKrHhkAB4KA5Yhve9la+d1UIuGeKpH3EITSkA4Q/nZc5z3J1sW6AkOGKleoQogAqaiZpkWAcWWswXep7HMvBQiVHhacIFePtDBQRH4cH3LQIBQbF683QzXy1tIKg0wUYQ3u0caFvG+NIFR6+WyGWkS/LARF5LIPcCL6pSjiIeGqRXyjUMRQFj4/pGjUUC2iaMOQ2ZTwVfiR4Rut3dHqEZd4BEkveYwbCfQvrRouGOgzZuXmeqrKVkT78wiSdF8cjBvx2VFbVTfQF2vIzW32UvUWmifXoZ08isSPGDlT6roaI0Ajzas2qjqZiJYI8nY3fR4IwefI0e770Ux+buUalUl0kRlA8qdbUQTn7iLoHPqjJNbYUFK5x1T1/WymFd9UVkedF0Igme7+0/jwCS81iRog7DbpDQw5gRchkEi6Dg5qDyUEabmuRPbiDkVviDNmWu21OSjCG4SGrFynqMA64VXaQENcSuOU45JDQyy3hSoRGR8WsuG0vhJ5LOdvhoQssddTIrMsaMhibwxJEwsE0BDiW3rIwudVlzBZMBGkEw4Idyz+CrhINhIk+J4wkRypRTqIRBJPTXhrUmFShnxvFcjXwENCa58yUKT3OESkJQRFJDKInfi1YUhlODzE2qkJzV0ZkxARXzStRERP8sLfhYX86sRGw92DYHiI9ul1CJJUUg4RIVpqIbmrYS4SIrIEBImoEGFXWhhEZNFKBMlG73ioSFNLAYZ4wUNE7TVYWgnfDg9pkyojkQwi4q5MK7zB5bCQs04aKAJ2V/NyHVid+IHvxyiSwIWFbDhpjSGRwb18aIi9RimGTEqgIURvPRRJm8pgwUM2YQi9hwkdyXsUDR8p7ENylyNMJKfuWTryUz5MJG64Ef2/QL5MExoSerMFTSus3mXwOglFf1RDchdERGGF5a7eBHiIRjuWuyQJ0BCjTe7K3CW7Da8Tb2XuevIYHqL9M5a7+lKDIXZiiaQVRmJXGEDWQkKWvIMi2XToSH4jJw020vR0JA/tZCM8RGRlgt7xt8MhIvEG1+Ejvsq0cntwNSzkrJP+C6R5NQlWJ+4vcxcsZMMP1i+QSniIvYYSSeFCQ4gBeiiSVi7ncx0gISRnjdCq4Znk/gcs7ueukBCCj0lVTV1rtYeAm7sZUo4gEDT3U+oKizwMQSOwlgSU+ZGjRR6jAtZFR3gGUC5fGjU+bGMH0wCla2fn+oYT5V8EyvMk4WaxFwAAAABJRU5ErkJggg==" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_e"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image5" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_e" id="image5" value="1" <?= $decoration["toy_e"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAL3UExURUdwTLp6Xey/ktWNkaFmVpiAfuKgJ7ODaK58Y9SvjOzZ2szAv9OTIcF0eZBSR8Syse6rL6x2J5xjY15AOr9zcoxNP6NxcV4/N9GBhbWnpJiSjqSgndZxdf3AQejOz/dyduLU0sqOjdvDwaFmZaFkY6RdXZNPTp5fXqRlZKqfnLFuYfq/PsuOH5lkGv/HQP/MRfmGidiEg++rM915e//FPLaHhZlWV/x2eqFra5lUVPt/g/Pg4MeMLsKFI9yzsvvBP/m1OY9eJLR5FqGemph+e/n9/PueoP98gdGSKPrDxLNmZtR1dsjBvq6noq6TkKpxGrybmJyale/j4/7m6L9iY2dHQMpnaGM/Of7X2f+ztfjw8Pr8/MWpp////9/g4M4IIPPz9K2uq/b3+IZDN5qal/kgMdfY2Pc8RvDx8dcsN8/Q0NUMI7GysOtIUOcxPOjo6ezt7d8vOuTk5aanpfsoOP9NVaGgnvr7+8zMzMcGHtTV1eo3QWAnGvE2QpWVkcfIyK8lLdzc3eA7Q7YGGtsUJ8UoMv5DTf5WXs4wOcDAv/5rcq4IGqQmLIuLh8TExK0yN9Y1PpgpLv11fLa2tbknMP5hab29vKI1OI+PjLq6ufYuPIwSGsAFHKMIGP78/Z8/QeJFTP0yP4aFgNQ9SMYzPM4mMYxKQd8dLm0rH4YcILsxOZcNGfNZYfVHT39ANa2ppbwGG48vMexASa5MTnY1KrcXI/VjavVOV6VVVeQmNLtDSKBJSsdHTLB6e/u3u/yWnJtTUuxQWMMZJ7BcX5ZJSLJnav+CiP46Re6lqJA1N/7g4pM/P8GCh9fJyeV2eueDiNVjZq1BQ+OVmtzR0q+WlNNRV9GcnY47PPGLkte9vqkXIY10cfm2N8q0tNuAheTCw/Ph4sOgocCSkr6rqr9SVY1cWf/09LGensdaX1wwJ6uJh/zp6vzU1ocqK/LNz+ZjaV06MtmpqvvLzqGQjumztv+orMRna+0TJv/NT55YO1sWEaIIANMAF4C8JE4AAADidFJOUwAwH/0j/v4HFQ/9//7+vTX+sv64TOv++v24x3X7/f7vRqtrdcjr+56Pn1p0+dee0dpf0c1PguOtsPGFhWnbwLeTdvz442bnmL3i3ojT0Nrv6ebTrumetva7pbmW6v///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////v////7CBY3gAAANxklEQVRo3t3aZ1jT5xYAcHYEpCLlcqGOukfds1Wrbe3eu70rEZAYUAJhGRSZSgKRLVsNYIBWBKlQARlhbwh7iQzZMi+i1tvnfrjnvP/EcT+YgLHPc+958ANf/OX8/+8573nfoKIyq5i3c/OWLVs275yn8sJCe8OWh0tuYWzf8KIYtbceLtGfD6Glpa//luqLMbY81N948MuFCxfu36ilpbX9RSjamx9qHdz0jgaNRtN4cz8oH72AJ7bhof7BTbJPr/oRKG8q3Zi3ZcnGTY+fkOp2fa39GspGdi7RP/jO419pb+prbVR2KrQNS7Q2PfnJ1bbrb1yobGTzkvmbnnp8b9+av1Dpa+vW0x9cGxGasjP5rw8OyEalIxtuae2f91T531L+O9l5S2vja0/+vkTry3eU3lSgMJ6ocbW3oGyUXie0DVrz5y/UkIbq27deQCIqqi/9C+JPskhMPHz1ZWVnQltbkpiYuKZgcBD+919//fXnn+/888fvld26Xko8fPgw/Lt6FYBTp07dufPPP79MexHI4UQwKOTUi0Ou/hHI40zu/I9ncphCfv4jkP+/TJRd8euqJyaukkqEuHPq999/v/Pj90rNRG3Ftx/HnjnT3dShLvr3oUOimv5+vVzvXOMDK9SU5ah++PHQUJlTuWPmuLlpb3v0b7/9xq7rYfRU1E1J1JcvU0oWe1+9T6ePhTnx4piZk+amlpMSZGymKnQYSyskksXLFzz3ALFiq0BQRacPlZWXxzkyWRWWppaWk3UuN27Y2BRK7jEYPY2SxZ+qPZex7C9lYXyBkE4X3uU5OjoymdEhk6BYTrYX2kB4TTXWMpqmu3e89hxL6n1OPp/vxB+jC7nc+3FMMKKjM9t7TcHRqZhysbGzs4uVTJ882aH+qfZcH9U+4TjfyYlXno8IV8xiOkazWKyU5IpeUDi99ySxoFiJ6ltrT3Ysn9s2qf1XofA+GLxy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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_f"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image6" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_f" id="image6" value="1" <?= $decoration["toy_f"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAALrUExURUdwTIqJiJiXlMhtbZubl/b19fTz8+/v8MCfnIuKitLExN9kZ5iVkdRZW52HhZpTUeZSWMtCSOf7+5ual7y7urQZJ55GR6ksNPX09enp6vTz87RUU9YnM9U9Rbb/9+bm5ulhZP9dZf9iaO3s7v5wdrE6QI2MhpaMiJ46PNwvO8bDw+Q9R417eeTj4dtFTNtZXp0wNPTy86Guq+vr6/1ocNQwO+rq66+xr52gnJwrMJCQjPX29/b29vb29qJISrUoM7cbKr0fLaUtMri4t5aXkv9cZbVARfLy79dLUfTx8evq6/9RXNQ/Rbq5uPLQ0re1srO1tN7e3uHh4f79/P5kbf9cZPX19b+/vKVVVbAxOZaWlKhaX8Khn8C/vsh0eKt1edynquU/Sdm8vJqZlff3956emba2s+CSluNNWev19dBVW+Fha9ttbu3t7ZF2deaztqaiof+vtY8rLZtYW/9faP2boP9QWt3d3f9mbf9ia/qdpPjHyfgN+87OIM7Nzs4LIs7O0M4KIM4LIc4NI87Oz84MI84IH84GHt/e39AMIc7R0c7Q0M7S0s4RJs7T1L29vdEPJM4DGs4VKs7Pz88NI9HQ0s7V1c0LIs3MzcwKIc7Iys64u84ZLs45SczLzM4jNs67vs7KzM4rPssHH8rJys5lcdTT1M9das6zt7++v8kKIM7Fx86/ws0JIMMKH89QXs6VnM7Cxc4nOs5WZMjIyNzc3dYYKtQTJs6Bis8zRc5FVc5KWc6MlM6do8gFHc6QmM6IkNbW2M5ves90fsERJNsiMc4wQs6kqc9qdsTExc19h7W2tc52gc6Zn7GxsM6qrujo6d80QfZZYs6vs8+gps3Q0M4eMsnKy+Tj5M6Ejc6nq88+TqSgn9DO0NCsscvPz+5OWLMPHs97hb4vPMPBwqamptIfMNxwesFEUsdaZceZn8KGjdTGydmgp/Tf4OpGUNqWm6yrq9q+wdyHj7uqrMSzte3N0OessNlBTshDzTUAAADRdFJOUwAk6w7oRUPjAiEIFrY6FT5Joh/iQP5K/mb0cjD+2Q7lKJBZ//CQYH209evOLriMXc6hIUv+9+fnRuHzfuHsm9v1+/DTy+9/LX5axqi/jrFs8odDqLJxzKxgq/HLqPfi8VGx+ZfEbrN67DPz/aLVyZfXMI/2zNvi4+XQ3f3M///////////////////////////////////////////////////////////////////////////////////////////////////////////////+/qJ0WQAACIBJREFUaN7tmGdUG1cWx7XLxlFwDLbjlriXjR2vHTvucUk2zeltU7b33ns/Z7pGMJqRYVRRQUJISEYSCIFAAokiqqmmNxNcsJ2e7bsf97034OTDfsgI8PHZo3s4hyN9mJ/+93/vfXeeQvGxY9PK20688vrJU6dOvv7AiSUrMxULH1tee/VPf35/+/bzYzk5OWNj5zfvfflJ5YISMpY/+7uBgQ/6+/9z/b13m0pANEXGxjbvPbhwcpTLn31i4GJ/a3VNTV5uXixp5Q0ag8EAQJG931ggNVu2PnHoYn91TR4KPUuGuwO8ZmrKAFCRb/1ky0Jgtv3m0MAcQg+DJkl7gtAQDAztXzbumzcl47U/HPqgtaYGEWjEoGm92hYtIhBFZ/Yefipjfm5kbN0hycjNpXD6wyCFZguBYRjD8D7HtRXzokBGK3A7VxhxjIg0yZKzJD0ldGMMomiT1Mh8KBnbdlxsrXaVX04M+qxW38R4pUtgJYyKFBp0DIRw1nCxmDpFue2PF/u9oQDH8xyn4cA/viJUJ5A0DUAq1jHIEChh3oJi8XSqkGWvDlx/Y8rIIYfh4zCMMFoaYjiOq0Coyy0EAyE9toLiR9akxli6dce/S4ygVDEMkxDIBN5ZKVC4CscpoUeDzPfbCwqKH16aSq6U2377r0iJZkqCMJjEAv84i0eg9HocB1LQt8NeuqC09NOpCPnlC+/nlBim5oToCM0ciLBUCiBjOGXrQ/DhRtpUUP/ZZfIZmfecOt9k0EzBLBG8lvAHKjAtp0EUzmpXUSpA6WYghGsXVabisi/K7/wnX9keKTEAzzGesca9k20ulx1WGnQB08ZtJLBfXYe0cYMOEkpZLxuy7uRYk2GKYQhiwhPWs1KQsUYL7A5dhR2UF662B1DJWV2UyVRfJtuVlQ+cj0BDeKdnhKVolQr86VU4i5db4XO5DpECn1w+2CqEtY2iTKVlD2fJhNz2HeAIoeN67DQFpghA4Cgoda0TQDQhG4Xr2fDgDSUFpfWrvyDT9nW3jwFHiHiYBI0HKNBmCmHYDguDafpGwCegBBYf5wOemErrWx6SZb1y04m7IwYDkXDggEDDR4OZJdAsS4FxAgpXMwgh0BNo/ISIm4CUsi9vUsqzBNjO99VSkKHCSSpcGU1MhDpiNImz0SKGS9ggpFIq4UaagpCWrx+QBVnyzFiT1uoVJAbraPZxWjAhjRXdNlLt8TNct0jhFN4IfccIr4rCTQXFLReOyYI8/dOcJuzyCEmrQK6o2naGm212ftwGIBrLJHgu63KiiVYBigvkq/hK73dlQdYdiTS1T4LSBTqocp80WwijVmvkKtnLRcYoFEJGIQPTNoqwJEzFnq5vy4Lcc3fk3Q4RHhsmsm4Q9h+m4wLx5mSjtSHWxzU4AENd50ffW2pZCAma3u66Uy5kyE6BwlWRrnY05jX+zhien58fbu7u8YrAfnWdE8H5BgGVtto+0/W4TEhJsw3MQBUldKLfSwS8IkuRQmUo2RlWq1l2JFmBksg526QGCnaO9spSolx35G/luXo0ngYJlBMP+PWkLcr4YiHfuMcz7tPBicyAsU8iBusKnOuV58nTm9+LAQg4/br9EMLFoQv05SI+SpdbtFotr0G1wFlg+cJxE2ycnvnrTllKDj7z92tQCRluh8/SBWr1FE7anQzhoYUoNnuS6bTWcoqUHKlzj85cvVeWkh++cL0a7Iw4Kw1dviEMHkQ2Wxhdh8CKyQCPqrki6mJnB5pjcLrqzIU98sbKz38sQZIVyN0O1AohM8M1ChRJxpKh9qEGj4tiTRJDaODdVWfuypIF2fT9HyCIMG6BZ5QfLiikOIQxnA+MdZzNV4kim89K4x8wouZC9znQJvLG8L7PtAIINdJQBEYg4ayDECFhZhhNUoAuADnULAJXi+NmptA9c3Wn3JeSb4IdWE85eorggWGtBRCcjIMPOn+5isQ/EqS6LaEjCkG2vrRH7jr/1H3VeTQJIPB8RUpw1gP7UlPhFdg5DMWqRY+TZ2C25LUiiuUgXzQ5EoIQyRPQb1bU/EVxu5APmp5V57MO7wSjYczm0aqzF+6Vv6Tef1+1nrLFLYS0N4DfTuGdZmlT9SeSdTFXW60nbuU4HYaBZJ3rejxLNgRJ0dOdFjTN4w5pdPRJS6ROyxX5/f6iYSMH28hcmJoQhRJKyWM9AXT2gZUR1VGtk5jbiRlp1wdhNgMhvT9L6RVl2XMbanJrfWhxx5KoGym28gZlLhgk5B+/Tu3dIXPfxla9YwgliO+LodMPZ2v7eOLDHR8JKZw+987aX6X4Drz0/sM1QnMFkqJrtknTVh3uDHAccQOjGx52v/3mpf0pv89tWbEhbxKeJww4tMqF2VlItnUPWoxG8HLHa41a/2CnveXSg+sVKcf6jRuuNaL6wvg37NLJARvQNumNhobaEw3dXrtYX3bpwez5XBgs37ih3Cclhku03RhXpDofF0RRFIL59ZCxZn6XEtnPHUZSgAfcUJi9MRTBhGSDweLS0rKy1fuz53vxsX7Fj/rMkpbhdjs5O7RMJtwUBC+KpWUta3ftmf8VztLTX3PqzCiGnR6bmjQFTcFgAQiIWP3o6QzFQsSyr+w2F6KYJhJ1gro4CAEIsXZX9kJd32Wu+vxud2GV2z3qnnYn3nKU1tcDQssjj+5as4BXd0rlqucf++pMVZW7qmq06p/vvPXmlStr9z+UvbCXkCCyVr34vceOvtTV1dv70tFf3LkzO0uxGKFUZB548eiF48ePHchULGas2n326vE7FIsbn/t9SdcnP7HYkM2RM4sOWXLkZkBuvymQnDQkDUlDbhXIp9KQj33LetMgd6QhaUgakoakIf8DEkmn65ZLVyRt/C2o5K7/B4gSpmvRlYAN8uyiQzIPvvz8MbmXQ/8FXBuPgcRsrT4AAAAASUVORK5CYII=" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_g"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image7" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_g" id="image7" value="1" <?= $decoration["toy_g"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_h"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image8" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_h" id="image8" value="1" <?= $decoration["toy_h"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_i"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image9" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_i" id="image9" value="1" <?= $decoration["toy_i"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_j"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image10" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_j" id="image10" value="1" <?= $decoration["toy_j"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_k"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image11" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_k" id="image11" value="1" <?= $decoration["toy_k"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,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" alt="img">
														</div>
														<div class="toys-select__options-item <?= $decoration["toy_l"] == 1 ? "toys-select__options-item-active" : null; ?>" data-id="image12" onclick="newyear_image_selection(this);">
															<input type="checkbox" name="toy_l" id="image12" value="1" <?= $decoration["toy_l"] == 1 ? "checked='checked'" : null; ?> style="display:none;" />
															<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAL9UExURUdwTIhLPZuVkYVEN+Te1HRCNf5IULeNiIpYV7l1ZYZFOqCNfHFGNnpAMpBsRvXu7no/M9E5PuzRy8CDZtXBqJKOi66EV+9CS+lETKScl/hBSqKGc04vKJZQQOR2Y4NNPf7IabuMXOJESt9ESfj08uG7m6E0NIV6c/rLt1QzLNXV0/v4+HM7L6l2WPO2bfjDhWM7Mvf08KszMuhJT8Y/P7CMZv/HietES6emopFHPNrPz+A+RJCMhc3HxPXy8+TX0JM1NrCEW/xNVdBMUPv29/v5+VQxKfe5a1w4LplxTeOqb8KBUMSQX8yTa6hxRbaRerxER/NGTop7avv6+sXBusGae9vV0cvIxvHa0ZeLhpaVjvnNobs6O8KZa8aSX//Ghurn5rS0sP9HUNnV1P38/IstL2IyKeR9Wejo5/rr4X15cuwjL50wMfxZYODf4L27t/Skbu/o6stSUti7nkwp2YhFN0wtJk8pIdvZ2vkwPYVDNv/IYuY0P/UxPt/e38gcJ04kG/BETuEwO7azsdXU1enn6Pc8RsLAwPA+SOk6ROTj5Ly3tnI2K9EhLes+Rq8YH9woNL+8u/Hx8r4ZI+3s7e8yPq+pp/q/gsrIyPf19WsyJ/88R6INFPw3Q83MzEkgF6Cbl7YaIsfFxf9DTF0tI/C3f6kWHb0qKPdXX8UqL6EXH6ajod07Q9HQ0Pr5+s6baa6fnHBcRpsaIP////FQWGE1K7KurPQ4Q+G/qNajb6N8VNI3P+eweeCqc0gmH8GSYo4XHP3Gi5p2UI2GgdYkMJcrLL+HQuguOa8oKWpUPayQjng7L/ft6/Z4f01DOG08LsKbjt+cYvUoNnpcOoRnR11LONYsNrB4d7h1Rvfl4ubMvpRZUVE6LF5TSNStl/pNVuRkZowoKbE9Ps+MVO7AlqBxQnVQJnlnVbJOUd2ytPPd2u2TmIthMZB4ZTsyKc5xdcGnpPe8W+6lqaOPe3pxaNNaV8aChtG6u8BlZ9fFw9bNyslMPppNO+2yUykjHFYw/OMAAAC6dFJOUwAe/uYUNf4FChFqWurL/imtK/4lJP78i/2F6jq+TjSN/P5sRJg4/vv+pz9j8nWPZ1FInVXx/Oy7z3p06Ke3gP29kdmn2+zcuoLd4/WpbcPHu6RztmLpxOrZv9Gn0P7L0OzYzdCm8vjz1N3N5dvt582zuuPq/////////////////////////////////////////////////////////////////////////////////////////////qX2IO4AAApRSURBVGjetZp3VFN5FschBEKQLiCiyIIgoKgoupYZe687zjiWse6M02f7AUIkQAghhZqQhI6hCTEQiIFQFQkoIEiRrjAUG4rYuzN79v5eAsOcPWfPmjxu/kjgHN7n3Xt/937vu0FP7/8y4qktrjZ6U2ukzxRMyt/IUwuxSBRQeNJpUwuZz6S8fvVyk/GUQohfPctNTQ1f4UOaypy4/SUTIMn0FXOnkGLlYJScGg5mv2/qMD5GAEEUNt1+xlSdshkD45Do6LxNU0Mhf2lklJmMGJy8vIqKTQsspgAyxwggmUYDdE5oV5dEIhk9OR9/iEtmZuZAbm6ufWhXVHCw5OX9/D8T8U9JckD4QG5RUV5XbVTF4/uUNB5jJv6QVBoNzhUnNG9w1JoSlsGKUK7E2xWLjQHXrwuji649s2Zyw9IyWDyGEu9ORjx0zWgg95pHL5/PDApLS2DxIhgiwix8IUsSex/0Jsr4TG5QUFg+ckQprvkB325JWsLn8wUChKBQEIQhrXlxT+45HV9PgMBUMyhhCRFS2xdyeXt7n5k+rnlnAoSLxYqFvJDfc3/R2dDcYoJr4r8TIEZYBkNs636vvb1d3gyMR6aG+ArjmowMFqPw+djYc8I9c3N5c0OHeUenE97K+Pmx5cvt7Oxabfs7O5sfPXrU3mEu/wHncjTcoSp3rqqqGmtQmTc86nv07wZz8wZ3nMvRSS7v75ff628ut2tubujs62s37+gn4Nu+iMd7qgqqylUd/Xbl8uaOzvY+SHyN6GNcIW67egouXCgrqJKrylXl8o6yDrm7iCX+AteiNz5+qy27sqysQNWgUnV0quzGePkscY0Y33hN37Pbuqm0rKBgrL//3vMnYnGEklBTQxDtx3nyOiBgristDYtgsDIipFJxjbt7jVikxFmF91OCuFxuGEiJlGBrSyAQxFKRiIGzCpMOUCjQInlSsa2tmBEREcEAU+Ktwqu5mCsQKwaPBcbjgXYpV+IrKwsSBWBcSloCsgzoZkgg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" alt="img">
														</div>


													</div>
												</div>
											</div>
										</div>


										<div class="new-year__settings-row">
											<div class="new-year__settings-row-label">Size</div>
											<div class="new-year__settings-row-options">
												<div role="toolbar" class="btn-toolbar">
													<div id="toys_size" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
														<label type="button" class="btn btn-default <?= $decoration["toy_size"] == 30 ? "active" : null; ?>">
															<input name="toy_size" type="radio" value="30" <?= $decoration["toy_size"] == 30 ? "checked='checked'" : null; ?>>Small
														</label>
														<label type="button" class="btn btn-default  <?= $decoration["toy_size"] == 50 ? "active" : null; ?>">
															<input name="toy_size" type="radio" value="50" <?= $decoration["toy_size"] == 50 ? "checked='checked'" : null; ?>>Medium
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_size"] == 80 ? "active" : null; ?>">
															<input name="toy_size" type="radio" value="80" <?= $decoration["toy_size"] == 80 ? "checked='checked'" : null; ?>>Large
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="new-year__settings-row">
											<div class="new-year__settings-row-label">Quantity</div>
											<div class="new-year__settings-row-options">
												<div role="toolbar" class="btn-toolbar">
													<div id="toys_quantity" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
														<label type="button" class="btn btn-default <?= $decoration["toy_quantity"] == 20 ? "active" : null; ?>">
															<input name="toy_quantity" type="radio" autocomplete="off" value="20" <?= $decoration["toy_quantity"] == 20 ? "checked='checked'" : null; ?>>20
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_quantity"] == 40 ? "active" : null; ?>">
															<input name="toy_quantity" type="radio" autocomplete="off" value="40" <?= $decoration["toy_quantity"] == 40 ? "checked='checked'" : null; ?>>40
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_quantity"] == 60 ? "active" : null; ?>">
															<input name="toy_quantity" type="radio" autocomplete="off" value="60" <?= $decoration["toy_quantity"] == 60 ? "checked='checked'" : null; ?>>60
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_quantity"] == 80 ? "active" : null; ?>">
															<input name="toy_quantity" type="radio" autocomplete="off" value="80" <?= $decoration["toy_quantity"] == 80 ? "checked='checked'" : null; ?>>80
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_quantity"] == 100 ? "active" : null; ?>">
															<input name="toy_quantity" type="radio" autocomplete="off" value="100" <?= $decoration["toy_quantity"] == 100 ? "checked='checked'" : null; ?>>100
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="new-year__settings-row">
											<div class="new-year__settings-row-label">Fall speed</div>
											<div class="new-year__settings-row-options">
												<div role="toolbar" class="btn-toolbar">
													<div id="toys_speed" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
														<label type="button" class="btn btn-default <?= $decoration["toy_speed"] == 1 ? "active" : null; ?>">
															<input name="toy_speed" type="radio" autocomplete="off" value="1" <?= $decoration["toy_speed"] == 1 ? "checked='checked'" : null; ?>>Slow
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_speed"] == 3 ? "active" : null; ?>">
															<input name="toy_speed" type="radio" autocomplete="off" value="3" <?= $decoration["toy_speed"] == 3 ? "checked='checked'" : null; ?>>Medium
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_speed"] == 6 ? "active" : null; ?>">
															<input name="toy_speed" type="radio" autocomplete="off" value="6" <?= $decoration["toy_speed"] == 6 ? "checked='checked'" : null; ?>>Fast
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="new-year__settings-row">
											<div class="new-year__settings-row-label">Launches</div>
											<div class="new-year__settings-row-options">
												<div role="toolbar" class="btn-toolbar">
													<div id="toys_launch" data-toggle="buttons" class="btn-group btn-group-sm btn-group-justified">
														<label type="button" class="btn btn-default <?= $decoration["toy_launch"] == 1 ? "active" : null; ?>">
															<input name="toy_launch" type="radio" autocomplete="off" value="1" <?= $decoration["toy_launch"] == 1 ? "checked='checked'" : null; ?>>One time
														</label>
														<label type="button" class="btn btn-default <?= $decoration["toy_launch"] == infinite ? "active" : null; ?>">
															<input name="toy_launch" type="radio" autocomplete="off" value="infinite" <?= $decoration["toy_launch"] == infinite ? "checked='checked'" : null; ?>>All time
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--PSW-->

						</div>


					</div>




					<div class="row">
						<p class="col-md-12 help-block">
							<!--  <small><font style="vertical-align: inherit;">Credit Goes To</font><font style="vertical-align: inherit;" ><code>PSW</code><font style="vertical-align: inherit;"></font></small> -->
						</p>
					</div>
				</div>
				<div class="new-year__footer">
					<button type="submit" class="btn btn-primary">Update Settings</button>


				</div>
		</div>

	</div>
	</form>


</div>
</div>
</div>

<script>
	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

	function setNMode(n) {
		console.log(n);
		if (n == 1) {
			$("body").addClass("dark-mode");
			document.getElementById("dark_symbol").innerHTML = '<i class="fas fa-sun"></i>';
		} else {
			$("body").removeClass("dark-mode");
			document.getElementById("dark_symbol").innerHTML = '<i class="fas fa-moon"></i>';
		}
	}

	function night_mode() {
		var night = getCookie('night_mode');
		if (night == 1) {
			//night
			setNMode('1');
		} else {
			setNMode('0');
		}
	}

	var dark_symbol = document.getElementById("dark_symbol");
	if (dark_symbol != null) {
		night_mode();
	}

	(function($) {


		$(document).ready(function() {
			$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
				event.preventDefault();
				event.stopPropagation();
				$(this).parent().siblings().removeClass('open');
				$(this).parent().toggleClass('open');
			});
		});

		$("#dark").on("click", function(e) {
			e.preventDefault();
			var t = $("body"),
				a = !t.hasClass("dark-mode");
			$("i", this).attr("class", a ? "fa fa-sun" : "fas fa-moon"), t.toggleClass("dark-mode", a),
				void 0 !== window.CodeMirrorEditor && window.CodeMirrorEditor.setOption("theme", a ? "material-darker" : "default"),
				$.ajax({
					url: "ajax_settings_update?method=dark-mode&type=update&now=" + (a ? 1 : 0),
					type: "GET",
					success: function(e) {},
					error: function(e, t, a) {
						console.log("Something was wrong...", t, a, e);
					}
				});
		});


	})(jQuery);
	$(function() {
		$('[data-toggle="tooltip"]').tooltip();

	})
</script>
<script>
	var checkAll_div = document.getElementsByClassName("checkAll");
	if (checkAll_div) {

		var checkAll = document.querySelector('.checkAll'),
			allCheckBox = document.querySelectorAll('.selectOrder'),
			countOrders = document.querySelector('.countOrders'),
			counter = 0;

		if (typeof checkAll !== 'undefined' && checkAll != null) {
			var checkAllParentTh = checkAll.closest('tr');
		}

	}

	var orderPriceSpan = (document.getElementsByClassName('orderPriceSpan')) ? document.querySelector('.orderPriceSpan') : false;
	var orderQuantitySpan = (document.getElementsByClassName('orderQuantitySpan')) ? document.querySelector('.orderQuantitySpan') : false;
	var orderRemainingSpan = (document.getElementsByClassName('orderRemainingSpan')) ? document.querySelector('.orderRemainingSpan') : false;

	var servicePriceSpan = (document.getElementsByClassName('servicePriceSpan')) ? document.querySelector('.servicePriceSpan') : false;
	var serviceRefillSpan = (document.getElementsByClassName('serviceRefillSpan')) ? document.querySelector('.serviceRefillSpan') : false;
	var serviceRefillerSpan = (document.getElementsByClassName('serviceRefillerSpan')) ? document.querySelector('.serviceRefillerSpan') : false;
	var serviceCountSpan = (document.getElementsByClassName('serviceCountSpan')) ? document.querySelector('.serviceCountSpan') : false;
	var serviceAutoCSpan = (document.getElementsByClassName('serviceAutoCSpan')) ? document.querySelector('.serviceAutoCSpan') : false;

	//console.log(orderPriceSpan);

	function selectAllCheckbox() {
		//alert();
		allCheckBox = document.querySelectorAll('.selectOrder');

		counter = 0;
		amount = 0;
		remaining = 0;
		pricee = 0;

		auto_refill = 0;
		auto_refiller = 0;
		auto_complete = 0;
		auto_start_count = 0;

		if (this.checked) {
			allCheckBox.forEach(function(oneCheckBox) {
				if (!oneCheckBox.disabled) {
					oneCheckBox.closest('tr').classList.add('active');
					checkAllParentTh.classList.add('show-action-menu');
					//oneCheckBox.checked = true;
					$('.selectOrder').prop('checked', true);
					counter++;
					if (oneCheckBox.classList.contains('orderPageBox')) {
						//console.log('yes');
						//console.log(oneCheckBox);
						pricee = pricee + parseFloat(oneCheckBox.getAttribute('data-price'));
						amount = amount + parseInt(oneCheckBox.getAttribute('data-amount'));
						remaining = remaining + parseInt(oneCheckBox.getAttribute('data-remaining'));
						//console.log(amount);
					}


					if (oneCheckBox.classList.contains('servicesPageBox')) {
						//console.log('yes');
						//console.log(oneCheckBox);

						var raw_auto_refill = parseFloat(oneCheckBox.getAttribute('data-auto_refill'));
						if (raw_auto_refill == 1) {
							auto_refill = auto_refill + 1;
						}

						var raw_auto_refiller = parseFloat(oneCheckBox.getAttribute('data-auto_refiller'));
						if (raw_auto_refiller == 1) {
							auto_refiller = auto_refiller + 1;
						}

						pricee = pricee + parseFloat(oneCheckBox.getAttribute('data-service-price'));

						var raw_auto_complete = parseFloat(oneCheckBox.getAttribute('data-auto_complete'));
						if (raw_auto_complete == 1) {
							auto_complete = auto_complete + 1;
						}

						var raw_start_count_type = parseFloat(oneCheckBox.getAttribute('data-start_count_type'));
						if (raw_start_count_type == 1) {
							auto_start_count = auto_start_count + 1;
						}
					}

				}
			});
			//countOrders.innerText = counter + ' users ';
			countOrders.innerText = counter + ' ';
			try {
				if (typeof orderPriceSpan !== 'undefined' && orderPriceSpan != null) {
					orderPriceSpan.innerText = pricee == 1 ? pricee + '  ' : pricee + '  ';
				}
				if (typeof orderQuantitySpan !== 'undefined' && orderQuantitySpan != null) {
					orderQuantitySpan.innerText = amount == 1 ? amount + '  ' : amount + '  ';
				}
				if (typeof orderRemainingSpan !== 'undefined' && orderRemainingSpan != null) {
					orderRemainingSpan.innerText = remaining == 1 ? remaining + '  ' : remaining + '  ';
				}

				if (typeof servicePriceSpan !== 'undefined' && servicePriceSpan != null) {
					servicePriceSpan.innerText = pricee == 1 ? pricee + '  ' : pricee + '  ';
				}
				if (typeof serviceRefillSpan !== 'undefined' && serviceRefillSpan != null) {
					serviceRefillSpan.innerText = auto_refill == 1 ? auto_refill + '  ' : auto_refill + '  ';
				}
				if (typeof serviceRefillerSpan !== 'undefined' && serviceRefillerSpan != null) {
					serviceRefillerSpan.innerText = auto_refiller == 1 ? auto_refiller + '  ' : auto_refiller + '  ';
				}
				if (typeof serviceCountSpan !== 'undefined' && serviceCountSpan != null) {
					serviceCountSpan.innerText = auto_start_count == 1 ? auto_start_count + '  ' : auto_start_count + '  ';
				}
				if (typeof serviceAutoCSpan !== 'undefined' && serviceAutoCSpan != null) {
					serviceAutoCSpan.innerText = auto_complete == 1 ? auto_complete + '  ' : auto_complete + '  ';
				}

			} catch (err) {

			}
		} else {
			allCheckBox.forEach(function(oneCheckBox) {
				oneCheckBox.closest('tr').classList.remove('active');
				checkAllParentTh.classList.remove('show-action-menu');
				oneCheckBox.checked = false;
			});
			counter = 0;
			amount = 0;
			remaining = 0;
			this.checked = false;
			countOrders.innerText = '';
		}
	}

	function selectOneCheckbox() {
		counter = 0;
		amount = 0;
		remaining = 0;
		pricee = 0;

		auto_refill = 0;
		auto_refiller = 0;
		auto_complete = 0;
		auto_start_count = 0;

		var trigger = false;
		allCheckBox.forEach(function(oneCheckBox) {
			var trParent = oneCheckBox.closest('tr');
			if (oneCheckBox.checked) {

				if (oneCheckBox.classList.contains('orderPageBox')) {
					//console.log('yes');
					//console.log(oneCheckBox);
					pricee = pricee + parseFloat(oneCheckBox.getAttribute('data-price'));
					amount = amount + parseInt(oneCheckBox.getAttribute('data-amount'));
					remaining = remaining + parseInt(oneCheckBox.getAttribute('data-remaining'));
					//console.log(amount);
				}

				if (oneCheckBox.classList.contains('servicesPageBox')) {
					//console.log('yes');
					//console.log(oneCheckBox);

					var raw_auto_refill = parseFloat(oneCheckBox.getAttribute('data-auto_refill'));
					if (raw_auto_refill == 1) {
						auto_refill = auto_refill + 1;
					}

					var raw_auto_refiller = parseFloat(oneCheckBox.getAttribute('data-auto_refiller'));
					if (raw_auto_refiller == 1) {
						auto_refiller = auto_refiller + 1;
					}

					pricee = pricee + parseFloat(oneCheckBox.getAttribute('data-service-price'));

					var raw_auto_complete = parseFloat(oneCheckBox.getAttribute('data-auto_complete'));
					if (raw_auto_complete == 1) {
						auto_complete = auto_complete + 1;
					}

					var raw_start_count_type = parseFloat(oneCheckBox.getAttribute('data-start_count_type'));
					if (raw_start_count_type == 1) {
						auto_start_count = auto_start_count + 1;
					}
				}

				counter++;
				trigger = true;
				trParent.classList.add('active');
			} else {
				trParent.classList.remove('active');
			}
		});

		if (trigger) {
			checkAll.checked = true;
			//countOrders.innerText = counter == 1?counter + ' user ':counter + ' users ';
			countOrders.innerText = counter == 1 ? counter + '  ' : counter + '  ';
			try {

				//console.log('yes');
				//

				//alert();
				// && servicePriceSpan !== false
				if (typeof servicePriceSpan !== 'undefined' && servicePriceSpan != null) {
					servicePriceSpan.innerText = pricee + '  ';
				}
				if (typeof serviceRefillSpan !== 'undefined' && serviceRefillSpan != null) {
					serviceRefillSpan.innerText = auto_refill + '  ';
				}
				if (typeof serviceRefillerSpan !== 'undefined' && serviceRefillerSpan != null) {
					serviceRefillerSpan.innerText = auto_refiller + '  ';
				}
				if (typeof serviceCountSpan !== 'undefined' && serviceCountSpan != null) {
					serviceCountSpan.innerText = auto_start_count + '  ';
				}
				if (typeof serviceAutoCSpan !== 'undefined' && serviceAutoCSpan != null) {
					serviceAutoCSpan.innerText = auto_complete + '  ';
				}

				if (typeof orderPriceSpan !== 'undefined' && orderPriceSpan != null) {
					orderPriceSpan.innerText = pricee == 1 ? pricee + '  ' : pricee + '  ';
				}
				if (typeof orderQuantitySpan !== 'undefined' && orderQuantitySpan != null) {
					orderQuantitySpan.innerText = amount == 1 ? amount + '  ' : amount + '  ';
				}
				if (typeof orderRemainingSpan !== 'undefined' && orderRemainingSpan != null) {
					orderRemainingSpan.innerText = remaining == 1 ? remaining + '  ' : remaining + '  ';
				}

			} catch (err) {

			}
			checkAllParentTh.classList.add('show-action-menu');
			return true;
		} else {
			checkAll.checked = false;
			checkAllParentTh.classList.remove('show-action-menu');
			return false;
		}
	}

	if (typeof checkAll !== 'undefined' && checkAll != null) {
		checkAll.addEventListener('change', selectAllCheckbox);
	}
	allCheckBox.forEach(function(oneCheckBox) {
		oneCheckBox.addEventListener('change', selectOneCheckbox)
	});


	function re_initialize_listeners() {

		allCheckBox = document.querySelectorAll('.selectOrder');
		allCheckBox.forEach(function(oneCheckBox) {
			oneCheckBox.addEventListener('change', selectOneCheckbox)
		});
		//alert();
		var checkAll = document.querySelector('.checkAll');
		if (typeof checkAll !== 'undefined' && checkAll != null) {
			checkAll.addEventListener('change', selectAllCheckbox);
		}

		$(document).ready(function() {
			$('body').tooltip({
				selector: '[data-toggle="tooltip"]'
			});
		});

	}

	$(document).ready(function() {
		$('#resetrates').click(function() {

			$("#bulkStatus").val('3');
			document.getElementById('bulkStatus').value = '3';
			//alert(document.getElementById('bulkStatus').value);
			$("#confirmChangeBulk").modal('show');

			return false;
		});

		//confirmEditService
		//editDescription
		//editdescriptionBody

		$('#editDescription').on('show.bs.modal', function(e) {
			document.getElementById("editdescriptionBody").style.display = "none";
			document.getElementById("editdescriptionBody2").style.display = "block";
			num = $(e.relatedTarget).data('href');

			var post_data = {
				method: "description",
				id: num
			};
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				//console.log(this);
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("editdescriptionBody").style.display = "block";
					document.getElementById("editdescriptionBody2").style.display = "none";

					var response = JSON.parse(this.responseText);
					if (response.status == 1) {
						document.getElementById('dessscription').value = urldecode(response.message);
						document.getElementById('start_id').value = num;

					} else {
						document.getElementById("editdescriptionBody").innerHTML = "<h2>Error.! reload page or contact administrator</h2>";
					}

					//$('#dessscription').val( 'Yeees' );
					//document.getElementById("editdescriptionBody").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "ajax_services_details", true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send(JSON.stringify(post_data));


			//alert(num);
			//return false;
		});



		$('#enabledservices').click(function() {
			//alert('1');
			$("#bulkStatus").val('1');
			$("#confirmChangeBulk").modal('show');
			return false;
		});

		$('#disabledservices').click(function() {
			//alert('2');
			$("#bulkStatus").val('2');
			$("#confirmChangeBulk").modal('show');
			return false;
		});

		$('#assign_category_selected').click(function() {
			$("#bulkStatus").val('11');
			$("#assign_category_modal").modal('show');
			return false;
		});

		$('#editServicesBulkActions').click(function() {
			$("#bulkStatus").val('15');
			$("#assign_bulkaction_modal").modal('show');
			return false;
		});

		$('#deleteServices').click(function() {
			$("#bulkStatus").val('10');
			$("#confirmChangeBulk").modal('show');
			return false;
		});
	});

	function map_categories() {
		$("#bulkStatus").val('1');
		$("#confirmChangeBulk").modal('show');

		return false;
	}

	function map_services() {
		//*
		$("#bulkStatus").val('2');
		$("#confirmChangeBulk").modal('show');
		return false;
		//*/

		document.getElementById("confirmYesBulk").disabled = true;

		var frm = $('#changebulkForm');
		//frm.submit(function (ev) {
		$.ajax({
			type: 'post',
			url: 'ajax_services_update',
			data: frm.serialize(),
			success: function(data) {
				get_list();
				if (typeof data.status !== 'undefined') {
					if (data.status == 1) {
						var message = data.message;
						document.getElementById("demo").innerHTML = '<div class="alert alert-success alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>' + message + '</strong></div>';
						//document.getElementById("demo").innerHTML = '<div class="alert alert-success alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Successfuly updated!</strong></div>';
					} else {
						var message = data.message;
						document.getElementById("demo").innerHTML = '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>' + message + '</strong></div>';
						//document.getElementById("demo").innerHTML = '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error. Please contact adminsitrator!</strong></div>';
					}
				} else {
					//console.log('no');
					document.getElementById("demo").innerHTML = '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error. Please contact adminsitrator!</strong></div>';
				}

				$('#confirmChangeBulk').modal('hide');
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				//alert("Status: " + textStatus); alert("Error: " + errorThrown);
				document.getElementById("demo").innerHTML = '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>There is communication problem. Please refresh page and try again!</strong></div>';
				$('#confirmChangeBulk').modal('hide');
			}
		});
		//ev.preventDefault();
		//});
		return false;
	}



	function urldecode(str) {
		if (typeof str != "string") {
			return str;
		}
		return decodeURIComponent(str.replace(/\+/g, ' '));
	}

	function copy_to_clipboard(value) {
		var tempInput = document.createElement("input");
		tempInput.value = value;
		document.body.appendChild(tempInput);
		tempInput.select();
		document.execCommand("copy");
		document.body.removeChild(tempInput);
		alert("Copied");
	}
</script>

<script>
	document.addEventListener("DOMContentLoaded", function(event) {
		var bs = BreakpointSwitcher.create({
			"768px": function(e) {
				e ? window.navPriority('[data-nav="navbar-priority"]', {
					containerSelector: null,
					containerWidthOffset: 180,
					dropdownLabel: '<span class="fa fa-ellipsis-v"></span>'
				}) : window.navPriority('[data-nav="navbar-priority"]', "destroy")
			}
		});
	});
</script>
<script>
	function change_newyear_status(e, l) {
		status = e.checked;
		if (status == 'true') {
			document.getElementById(l).style.display = "block";
		} else {
			//console.log('false');
			document.getElementById(l).style.display = "none";
		}
	}

	function newyear_image_selection(e) {
		//
		d = 'toys-select__options-item-active';
		count = document.querySelectorAll('.' + d).length;
		//console.log(count);
		id = e.getAttribute('data-id');
		if (e.classList.contains(d)) {
			e.classList.remove(d);
			document.getElementById(id).checked = false;
		} else {

			if (count >= 5) {
				return false;
			}

			e.classList.add(d);
			document.getElementById(id).checked = true;
		}

	}
</script>