<?php $page = $this->template->content; ?>

<div class="front-page">
	<div class="row">
		<div class="col-md-12">
			<?php blocks( 'full_width_top', get_slug() ); ?>
		</div>
	</div>


	<section class="white-wrapper">
		<div class="container inner">
			<div class="row mt-40">
				<div class="col-md-12">

					<h1 class = "text-align-center mt-40 black-color font-weight-bold mb-40 pb-40">Buy a domain and everything else you need</h1>
					<div class = "d-flex justify-content-center">
						<ul class="nav nav-pills tab-style">
							<li class="p-2"><a class="tab-style active" data-toggle="pill" href="#plesk">Promos</a></li>
							<li class="p-2"><a class = "tab-style" data-toggle="pill" href="#directadmin">Domains</a></li>
							<li class="p-2"><a class = "tab-style" data-toggle="pill" href="#cpanelhosting">WordPress</a></li>
							<li class="p-2"><a class = "tab-style" data-toggle="pill" href="#resellerhosting">Hosting</a></li>
							<li class="p-2"><a class = "tab-style" data-toggle="pill" href="#vpshosting">Security</a></li>
							<li class="p-2"><a class = "tab-style" data-toggle="pill" href="#apps">Apps</a></li>
						</ul>
					</div>


					<div class="tab-content pt-40">
						<div id="plesk" class="tab-pane fade in active">
							<?php blocks( 'footer_top', get_slug() ); ?>
						</div>
						<div id="directadmin" class="tab-pane fade">
							<?php blocks( 'page_bottom', get_slug() ); ?>
						</div>
						<div id="cpanelhosting" class="tab-pane fade">
							<?php blocks( 'content_bottom', get_slug() ); ?>
						</div>
						<div id="resellerhosting" class="tab-pane fade">
							<?php blocks( 'content_top', get_slug() ); ?>
						</div>
						<div id="vpshosting" class="tab-pane fade">
							<?php blocks( 'sidebar_left', get_slug() ); ?>
						</div>
						<div id="apps" class="tab-pane fade">
							<?php blocks( 'sidebar_right', get_slug() ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
<!--    <section class="whitesmoke-wrapper">-->
<!--        <div class="container inner">-->
<!--            <div class="row pt-40">-->
<!--                <div class="col-md-12">-->
<!--                    <h2 class = "black-color">Rated 4.7 out of 5 by 1.5M+ customers</h2>-->
<!--                    <img class = "m-auto d-flex" loading="lazy" class="nchp-lazy entered nchp-lazy--loaded" data-src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMzAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAzMTQuNiA5Ni40Ij48c3R5bGU+LnN0MHtmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiMwMDI2M2F9LnN0MXtmaWxsOiNmODhkMmJ9LnN0MntmaWxsOiMwMDI2M2F9PC9zdHlsZT48ZyBpZD0iSXNvbGF0aW9uX01vZGUiPjxnIGlkPSJMYXllcl8xXzFfIj48cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTUuOCA3OS4yYzQuMiAwIDcuNiAzLjQgNy42IDcuNnMtMy40IDcuNi03LjYgNy42Yy00LjIgMC03LjYtMy40LTcuNi03LjYgMC00LjIgMy40LTcuNiA3LjYtNy42ek00NC42IDc5LjJjNC4yIDAgNy42IDMuNCA3LjYgNy42cy0zLjQgNy42LTcuNiA3LjZjLTQuMiAwLTcuNi0zLjQtNy42LTcuNi0uMS00LjIgMy40LTcuNiA3LjYtNy42ek0zNC44IDc1LjFoMTguN0M1Ny42IDQ3LjYgNjkuMSAyMi41IDg2IDEuOSA2Mi4yIDIwLjQgNDQuMSA0NS44IDM0LjggNzUuMXpNMTMuMiA3NS4xaDEyLjNjLTQuNi0yOC40LTEzLTQ1LjItMTMtNDUuMmgxMC45YzIuMyAwIDIuOCAxLjggMy40IDMgLjkgMiAzLjQgOC43IDUuMSAxMy41IDYuMS05LjEgMTMuMy0xNy42IDIxLjItMjUuMWgtNDVDMy41IDIxLjMtLjEgMjUuNC41IDMwbDUgMzguNWMuNiAzLjcgMy44IDYuNiA3LjcgNi42eiIvPjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik0xNDggMjguOGg5LjV2M0gxNDh6TTI1Mi4zIDI0LjNsLjUtMy4xaC05LjRzLTQtLjEtNC40IDQuMWMtLjMgMy42LTEuNiAxMC4yLTEuNiAxMC4ycy0uNiAzLjEgMi45IDMuMmg5LjZsLjUtMy4yaC04LjJjLS42IDAtLjktLjUtLjktLjlsLjUtMy4xaDguMWwuNS0zLjJoLThsLjUtMy4zYy4xLS4zLjQtLjggMS4xLS44bDguMy4xek0yNzEuMSAyMS4yaC05LjJsLTIuOCAxNy42aDMuN2wxLjEtNi42aDMuM2wyLjIgNi42aDQuM2wtMi43LTdjMi44LS4xIDQuMi0zLjcgNC4yLTYuMnYtLjdjLjEtMi0xLjUtMy43LTQuMS0zLjd6bTAgNi42Yy0uMy45LTEgMS40LTEuNyAxLjRoLTQuOWwuOC01SDI3MC4yYzEuNCAwIDEuNCAxLjYgMS4zIDIuMmwtLjQgMS40eiIvPjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik0xNDQuMiAzOC44bDIuOC0xNy42aDMuOEwxNDggMzguOHpNMTU0LjggMzguOGwyLjgtMTcuNmgzLjhsLTIuOCAxNy42ek0xNjkuNCAyOC4xbC0uNiAzLjZjLS40IDIuNS0uNCA3IDUuMSA3LjFoMy41YzMuNiAwIDYuNC0yLjUgNy4zLTYuOWwuNS0zLjRjLjctNC45LTEuMS02LjgtMy45LTcuMy0uOS0uMi0yLS4yLTMuOC0uMi00LjMtLjEtNyAyLjEtOC4xIDcuMXptMy4yIDMuOGwuNi0zLjVjLjYtMy4xIDItNC4yIDMuOC00LjJoMi4yYzEuNyAwIDIuNiAxLjEgMi40IDQuMS0uMSAxLjMtLjYgMy43LS42IDMuNy0uNSAyLjYtMi4xIDMuOC00IDMuOGgtMS42Yy0yLjEgMC0zLjMtMS4zLTIuOC0zLjl6TTIwNC44IDIxLjJoLTkuNGwtMi44IDE3LjZoMy44bDEuMS02LjUgNi4xLS4xYzIuOC0uMSA1LTIuNyA1LjItNi4zdi0xLjJjLS4xLTItMS43LTMuNS00LTMuNXptMCA1LjRsLS4yLjljLS4yIDEuMi0xLjIgMS44LTIgMS44aC00LjdsLjgtNS4yaDQuN2MxLjUgMCAxLjYgMS45IDEuNCAyLjV6TTIyNy4yIDIxLjJoLTkuNEwyMTUgMzguOGgzLjhsMS4xLTYuNSA2LjEtLjFjMi44LS4xIDUtMi43IDUuMi02LjN2LTEuMmMwLTItMS42LTMuNS00LTMuNXptLjEgNS40bC0uMi45Yy0uMiAxLjItMS4yIDEuOC0yIDEuOGgtNC43bC44LTUuMmg0LjdjMS41IDAgMS41IDEuOSAxLjQgMi41ek0xMjguMyAyNC4zaDcuOWwuNC0zLjFoLTguNWMtMi44IDAtNC44IDEuOC01LjMgNC4xbC0uMiAxLjgtLjEuOGMtLjIgMS45LjkgMy43IDQuMyAzLjdsMy44LjFjLjUgMCAuOS40LjkuOWwtLjIgMS43YzAgLjctLjggMS40LTEuNyAxLjRsLTUuNi4xaC0yLjNsLS41IDMuMWgzbDUuNi0uMWMyLjggMCA0LjktMS45IDUuMy00LjVsLjMtMi41YzAtMS45LTEuMS0zLjQtMy41LTMuNWgtNC41cy0xLjItLjEtMS4yLTFsLjItMS42Yy41LS45IDEuMi0xLjQgMS45LTEuNHoiLz48Zz48cGF0aCBjbGFzcz0ic3QyIiBkPSJNMzEzLjYgMzkuMWMwIDIuMi0xLjcgMy45LTQgMy45LTIuMiAwLTQtMS43LTQtMy45IDAtMi4xIDEuOC0zLjkgNC0zLjkgMi4zIDAgNCAxLjggNCAzLjl6bS03IDBjMCAxLjcgMS4zIDMuMSAzIDMuMXMyLjktMS40IDIuOS0zLjFjMC0xLjctMS4yLTMuMS0zLTMuMS0xLjYgMC0yLjkgMS40LTIuOSAzLjF6bTIuNCAyaC0uOXYtMy45Yy40LS4xLjgtLjEgMS41LS4xczEuMS4xIDEuMy4zYy4yLjIuNC41LjQuOCAwIC40LS4zLjgtLjguOS40LjEuNi40LjcuOS4xLjYuMi44LjMgMWgtMWMtLjEtLjEtLjItLjUtLjMtLjktLjEtLjQtLjMtLjYtLjgtLjZoLS40djEuNnptMC0yLjJoLjRjLjUgMCAuOS0uMi45LS42IDAtLjQtLjMtLjYtLjgtLjZoLS41djEuMnoiLz48L2c+PC9nPjxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik05Ni40IDY0LjFsMS40IDExaDcuMWMtLjEtNC4zLTQuMi0zOS4zLTQuMi0zOS4zaC0zLjZjLTQuMiAwLTcuNyAxLjMtMTEuMyA3LjQtOCAxMy41LTE2LjMgMjguMi0xOC40IDMxLjloNy4yYzEuMy0yLjMgMS40LTMgMi40LTQuNiAzLTQuOCA2LjgtNi40IDExLjYtNi40aDcuOHptLTIuMi0yMS40TDk2IDYwSDgyLjlzOS4yLTE0LjkgOS44LTE2Yy42LTEuMSAxLjUtMS4zIDEuNS0xLjN6TTI0NC4xIDQ1LjhsLjEtLjFoLTcuNmwtMTAuOCAyMi41LTIuOC0yMi41aC03LjNjLjUgMyA0LjUgMjkuNCA0LjUgMjkuNEgyMjguOHMxMy40LTI1LjggMTUuMy0yOS4zek0zMDAuOSAzNS43SDI5NGwtMS41IDEwaC03LjNjLTguMyAwLTExLjggMy42LTEzLjQgMTMuNy0xIDYtLjMgMTAuNCAxLjkgMTIuOSAxLjYgMS44IDQgMi44IDcuMiAyLjhoMTMuOGw2LjItMzkuNHpNMjg4LjcgNzBoLTUuOWMtMS43IDAtMi44LS40LTMuNS0xLjMtMS4yLTEuNC0xLjQtNC0uNi04LjUgMS02LjUgMy4xLTkuNSA2LjgtOS41aDYuNEwyODguNyA3MHpNMjY3LjcgNDhjLTEuMy0xLjYtMy42LTIuNC02LjQtMi40aC01LjljLTcuNy4zLTEwLjkgMy45LTEyLjUgMTMuNy0xIDYtLjMgMTAuNCAxLjkgMTIuOSAxLjYgMS44IDQgMi44IDcuMiAyLjhoMTIuOWwxLTUuMWgtMTJjLTEuNyAwLTIuOC0uNC0zLjUtMS4zLS45LTEtMS4yLTItMS00LjZoMTIuOWwuOC0uMWMxLjQtLjIgNS0xLjQgNi4xLTguNS40LTMuMiAwLTUuNy0xLjUtNy40em0tNS42IDcuN2MtLjMgMi41LTEuMiA0LjItNC4xIDQuMmgtOC4zYy4xLS42LjQtMS43LjUtMi4yIDEuMS00LjcgMy4xLTYuOSA2LjMtNi45aDMuNGMuOC4xIDEuNC4zIDEuOC43LjYuNi42IDIuNS40IDQuMnpNMTg5LjEgNDUuNGMtLjUtLjEtMS4xLS4xLTEuOC0uMS0xLjUgMC0yLjkuMi00LjIuNy0xLjMuNC0yLjMuOS0zLjEgMS40LS43LjQtMS43IDEtMi44IDEuOGwuNi0zLjZIMTcxbC00LjYgMjkuNmg2LjlMMTc2IDU4Yy40LTIuNSAyLjEtNC43IDQuNi01LjUgMS4zLS40IDIuNy0uNiA0LjQtLjcuOS0yLjggMi4zLTQuOSA0LjEtNi40ek0yMTMuMSA2MS4zYzEtNi4yLjUtMTAuNS0xLjYtMTIuOS0yLjItMi42LTYtMy05LjUtMy04LjQgMC0xMy43IDEtMTUuOSAxNC40LTEgNi0uNSAxMC4xIDEuNSAxMi41IDIuMiAyLjYgNi4xIDIuOSA5LjcgMi45IDguMiAwIDEzLjgtLjkgMTUuOC0xMy45em0tMTkuNiA3LjJjLTEuMS0xLjItMS4yLTMuMy0uNC04IDEuNC04LjQgMy05LjcgOC4xLTkuNyAyLjEgMCAzLjcuMiA0LjYgMS4zIDEuMSAxLjMgMS4zIDMuNy41IDguNS0xLjIgNy4yLTIuOSA5LjItOC4xIDkuMi0yLjYuMS0zLjktLjMtNC43LTEuM3pNMTMzLjQgNDguNGMtMS42LTEuOC00LTIuOC03LjItMi44aC0xMy44TDEwNi4zIDg1aDYuOWwxLjUtMTBoNy4zYzguMyAwIDExLjgtMy42IDEzLjQtMTMuNy45LTYgLjItMTAuMy0yLTEyLjl6bS00LjkgMTJjLTEgNi41LTMuMSA5LjUtNi44IDkuNWgtNi40bDMuMS0xOS4yaDUuOWMxLjcgMCAyLjguNCAzLjUgMS4zIDEuMiAxLjMgMS40IDQgLjcgOC40ek0xNjIuNiA0OC40Yy0xLjYtMS44LTQtMi44LTcuMi0yLjhoLTEzLjhMMTM1LjQgODVoNi45bDEuNS0xMGg3LjNjOC4zIDAgMTEuOC0zLjYgMTMuNC0xMy43LjktNiAuMy0xMC4zLTEuOS0xMi45em0tNSAxMmMtMSA2LjUtMy4xIDkuNS02LjggOS41aC02LjRsMy4xLTE5LjJoNS45YzEuNyAwIDIuOC40IDMuNSAxLjMgMS4yIDEuMyAxLjQgNCAuNyA4LjR6Ii8+PC9nPjwvc3ZnPgo=" alt="Join Our Newsletter" data-ll-status="loaded" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMzAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAzMTQuNiA5Ni40Ij48c3R5bGU+LnN0MHtmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiMwMDI2M2F9LnN0MXtmaWxsOiNmODhkMmJ9LnN0MntmaWxsOiMwMDI2M2F9PC9zdHlsZT48ZyBpZD0iSXNvbGF0aW9uX01vZGUiPjxnIGlkPSJMYXllcl8xXzFfIj48cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTUuOCA3OS4yYzQuMiAwIDcuNiAzLjQgNy42IDcuNnMtMy40IDcuNi03LjYgNy42Yy00LjIgMC03LjYtMy40LTcuNi03LjYgMC00LjIgMy40LTcuNiA3LjYtNy42ek00NC42IDc5LjJjNC4yIDAgNy42IDMuNCA3LjYgNy42cy0zLjQgNy42LTcuNiA3LjZjLTQuMiAwLTcuNi0zLjQtNy42LTcuNi0uMS00LjIgMy40LTcuNiA3LjYtNy42ek0zNC44IDc1LjFoMTguN0M1Ny42IDQ3LjYgNjkuMSAyMi41IDg2IDEuOSA2Mi4yIDIwLjQgNDQuMSA0NS44IDM0LjggNzUuMXpNMTMuMiA3NS4xaDEyLjNjLTQuNi0yOC40LTEzLTQ1LjItMTMtNDUuMmgxMC45YzIuMyAwIDIuOCAxLjggMy40IDMgLjkgMiAzLjQgOC43IDUuMSAxMy41IDYuMS05LjEgMTMuMy0xNy42IDIxLjItMjUuMWgtNDVDMy41IDIxLjMtLjEgMjUuNC41IDMwbDUgMzguNWMuNiAzLjcgMy44IDYuNiA3LjcgNi42eiIvPjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik0xNDggMjguOGg5LjV2M0gxNDh6TTI1Mi4zIDI0LjNsLjUtMy4xaC05LjRzLTQtLjEtNC40IDQuMWMtLjMgMy42LTEuNiAxMC4yLTEuNiAxMC4ycy0uNiAzLjEgMi45IDMuMmg5LjZsLjUtMy4yaC04LjJjLS42IDAtLjktLjUtLjktLjlsLjUtMy4xaDguMWwuNS0zLjJoLThsLjUtMy4zYy4xLS4zLjQtLjggMS4xLS44bDguMy4xek0yNzEuMSAyMS4yaC05LjJsLTIuOCAxNy42aDMuN2wxLjEtNi42aDMuM2wyLjIgNi42aDQuM2wtMi43LTdjMi44LS4xIDQuMi0zLjcgNC4yLTYuMnYtLjdjLjEtMi0xLjUtMy43LTQuMS0zLjd6bTAgNi42Yy0uMy45LTEgMS40LTEuNyAxLjRoLTQuOWwuOC01SDI3MC4yYzEuNCAwIDEuNCAxLjYgMS4zIDIuMmwtLjQgMS40eiIvPjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik0xNDQuMiAzOC44bDIuOC0xNy42aDMuOEwxNDggMzguOHpNMTU0LjggMzguOGwyLjgtMTcuNmgzLjhsLTIuOCAxNy42ek0xNjkuNCAyOC4xbC0uNiAzLjZjLS40IDIuNS0uNCA3IDUuMSA3LjFoMy41YzMuNiAwIDYuNC0yLjUgNy4zLTYuOWwuNS0zLjRjLjctNC45LTEuMS02LjgtMy45LTcuMy0uOS0uMi0yLS4yLTMuOC0uMi00LjMtLjEtNyAyLjEtOC4xIDcuMXptMy4yIDMuOGwuNi0zLjVjLjYtMy4xIDItNC4yIDMuOC00LjJoMi4yYzEuNyAwIDIuNiAxLjEgMi40IDQuMS0uMSAxLjMtLjYgMy43LS42IDMuNy0uNSAyLjYtMi4xIDMuOC00IDMuOGgtMS42Yy0yLjEgMC0zLjMtMS4zLTIuOC0zLjl6TTIwNC44IDIxLjJoLTkuNGwtMi44IDE3LjZoMy44bDEuMS02LjUgNi4xLS4xYzIuOC0uMSA1LTIuNyA1LjItNi4zdi0xLjJjLS4xLTItMS43LTMuNS00LTMuNXptMCA1LjRsLS4yLjljLS4yIDEuMi0xLjIgMS44LTIgMS44aC00LjdsLjgtNS4yaDQuN2MxLjUgMCAxLjYgMS45IDEuNCAyLjV6TTIyNy4yIDIxLjJoLTkuNEwyMTUgMzguOGgzLjhsMS4xLTYuNSA2LjEtLjFjMi44LS4xIDUtMi43IDUuMi02LjN2LTEuMmMwLTItMS42LTMuNS00LTMuNXptLjEgNS40bC0uMi45Yy0uMiAxLjItMS4yIDEuOC0yIDEuOGgtNC43bC44LTUuMmg0LjdjMS41IDAgMS41IDEuOSAxLjQgMi41ek0xMjguMyAyNC4zaDcuOWwuNC0zLjFoLTguNWMtMi44IDAtNC44IDEuOC01LjMgNC4xbC0uMiAxLjgtLjEuOGMtLjIgMS45LjkgMy43IDQuMyAzLjdsMy44LjFjLjUgMCAuOS40LjkuOWwtLjIgMS43YzAgLjctLjggMS40LTEuNyAxLjRsLTUuNi4xaC0yLjNsLS41IDMuMWgzbDUuNi0uMWMyLjggMCA0LjktMS45IDUuMy00LjVsLjMtMi41YzAtMS45LTEuMS0zLjQtMy41LTMuNWgtNC41cy0xLjItLjEtMS4yLTFsLjItMS42Yy41LS45IDEuMi0xLjQgMS45LTEuNHoiLz48Zz48cGF0aCBjbGFzcz0ic3QyIiBkPSJNMzEzLjYgMzkuMWMwIDIuMi0xLjcgMy45LTQgMy45LTIuMiAwLTQtMS43LTQtMy45IDAtMi4xIDEuOC0zLjkgNC0zLjkgMi4zIDAgNCAxLjggNCAzLjl6bS03IDBjMCAxLjcgMS4zIDMuMSAzIDMuMXMyLjktMS40IDIuOS0zLjFjMC0xLjctMS4yLTMuMS0zLTMuMS0xLjYgMC0yLjkgMS40LTIuOSAzLjF6bTIuNCAyaC0uOXYtMy45Yy40LS4xLjgtLjEgMS41LS4xczEuMS4xIDEuMy4zYy4yLjIuNC41LjQuOCAwIC40LS4zLjgtLjguOS40LjEuNi40LjcuOS4xLjYuMi44LjMgMWgtMWMtLjEtLjEtLjItLjUtLjMtLjktLjEtLjQtLjMtLjYtLjgtLjZoLS40djEuNnptMC0yLjJoLjRjLjUgMCAuOS0uMi45LS42IDAtLjQtLjMtLjYtLjgtLjZoLS41djEuMnoiLz48L2c+PC9nPjxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik05Ni40IDY0LjFsMS40IDExaDcuMWMtLjEtNC4zLTQuMi0zOS4zLTQuMi0zOS4zaC0zLjZjLTQuMiAwLTcuNyAxLjMtMTEuMyA3LjQtOCAxMy41LTE2LjMgMjguMi0xOC40IDMxLjloNy4yYzEuMy0yLjMgMS40LTMgMi40LTQuNiAzLTQuOCA2LjgtNi40IDExLjYtNi40aDcuOHptLTIuMi0yMS40TDk2IDYwSDgyLjlzOS4yLTE0LjkgOS44LTE2Yy42LTEuMSAxLjUtMS4zIDEuNS0xLjN6TTI0NC4xIDQ1LjhsLjEtLjFoLTcuNmwtMTAuOCAyMi41LTIuOC0yMi41aC03LjNjLjUgMyA0LjUgMjkuNCA0LjUgMjkuNEgyMjguOHMxMy40LTI1LjggMTUuMy0yOS4zek0zMDAuOSAzNS43SDI5NGwtMS41IDEwaC03LjNjLTguMyAwLTExLjggMy42LTEzLjQgMTMuNy0xIDYtLjMgMTAuNCAxLjkgMTIuOSAxLjYgMS44IDQgMi44IDcuMiAyLjhoMTMuOGw2LjItMzkuNHpNMjg4LjcgNzBoLTUuOWMtMS43IDAtMi44LS40LTMuNS0xLjMtMS4yLTEuNC0xLjQtNC0uNi04LjUgMS02LjUgMy4xLTkuNSA2LjgtOS41aDYuNEwyODguNyA3MHpNMjY3LjcgNDhjLTEuMy0xLjYtMy42LTIuNC02LjQtMi40aC01LjljLTcuNy4zLTEwLjkgMy45LTEyLjUgMTMuNy0xIDYtLjMgMTAuNCAxLjkgMTIuOSAxLjYgMS44IDQgMi44IDcuMiAyLjhoMTIuOWwxLTUuMWgtMTJjLTEuNyAwLTIuOC0uNC0zLjUtMS4zLS45LTEtMS4yLTItMS00LjZoMTIuOWwuOC0uMWMxLjQtLjIgNS0xLjQgNi4xLTguNS40LTMuMiAwLTUuNy0xLjUtNy40em0tNS42IDcuN2MtLjMgMi41LTEuMiA0LjItNC4xIDQuMmgtOC4zYy4xLS42LjQtMS43LjUtMi4yIDEuMS00LjcgMy4xLTYuOSA2LjMtNi45aDMuNGMuOC4xIDEuNC4zIDEuOC43LjYuNi42IDIuNS40IDQuMnpNMTg5LjEgNDUuNGMtLjUtLjEtMS4xLS4xLTEuOC0uMS0xLjUgMC0yLjkuMi00LjIuNy0xLjMuNC0yLjMuOS0zLjEgMS40LS43LjQtMS43IDEtMi44IDEuOGwuNi0zLjZIMTcxbC00LjYgMjkuNmg2LjlMMTc2IDU4Yy40LTIuNSAyLjEtNC43IDQuNi01LjUgMS4zLS40IDIuNy0uNiA0LjQtLjcuOS0yLjggMi4zLTQuOSA0LjEtNi40ek0yMTMuMSA2MS4zYzEtNi4yLjUtMTAuNS0xLjYtMTIuOS0yLjItMi42LTYtMy05LjUtMy04LjQgMC0xMy43IDEtMTUuOSAxNC40LTEgNi0uNSAxMC4xIDEuNSAxMi41IDIuMiAyLjYgNi4xIDIuOSA5LjcgMi45IDguMiAwIDEzLjgtLjkgMTUuOC0xMy45em0tMTkuNiA3LjJjLTEuMS0xLjItMS4yLTMuMy0uNC04IDEuNC04LjQgMy05LjcgOC4xLTkuNyAyLjEgMCAzLjcuMiA0LjYgMS4zIDEuMSAxLjMgMS4zIDMuNy41IDguNS0xLjIgNy4yLTIuOSA5LjItOC4xIDkuMi0yLjYuMS0zLjktLjMtNC43LTEuM3pNMTMzLjQgNDguNGMtMS42LTEuOC00LTIuOC03LjItMi44aC0xMy44TDEwNi4zIDg1aDYuOWwxLjUtMTBoNy4zYzguMyAwIDExLjgtMy42IDEzLjQtMTMuNy45LTYgLjItMTAuMy0yLTEyLjl6bS00LjkgMTJjLTEgNi41LTMuMSA5LjUtNi44IDkuNWgtNi40bDMuMS0xOS4yaDUuOWMxLjcgMCAyLjguNCAzLjUgMS4zIDEuMiAxLjMgMS40IDQgLjcgOC40ek0xNjIuNiA0OC40Yy0xLjYtMS44LTQtMi44LTcuMi0yLjhoLTEzLjhMMTM1LjQgODVoNi45bDEuNS0xMGg3LjNjOC4zIDAgMTEuOC0zLjYgMTMuNC0xMy43LjktNiAuMy0xMC4zLTEuOS0xMi45em0tNSAxMmMtMSA2LjUtMy4xIDkuNS02LjggOS41aC02LjRsMy4xLTE5LjJoNS45YzEuNyAwIDIuOC40IDMuNSAxLjMgMS4yIDEuMyAxLjQgNCAuNyA4LjR6Ii8+PC9nPjwvc3ZnPgo=" data-nsfw-filter-status="sfw" style="visibility: visible;">-->
<!--                    <h3 class = "text-align-center pb-30">Real customer ratings and reviews at Shopper Approved. <a href = "#" class = "orange-color">Read them all →</a></h3>-->
<!--                    <h3 class = "pt-30 black-color text-align-center">Trusted the world over</h3>-->
<!--                    <div class = "p-20 w-50 m-auto justify-content-spacebetween d-md-flex ">-->
<!--                        <img class = "p-10 m-auto d-flex" width="120"  src="--><?//=base_url()?><!--resource/uploads/figma-logo.svg"/>-->
<!--                        <img class = "p-10 m-auto d-flex" width="120" src="--><?//=base_url()?><!--resource/uploads/imgur-logo.svg"/>-->
<!--                        <img class = " p-10 m-auto d-flex" width="120" src="--><?//=base_url()?><!--resource/uploads/privacy-logo.svg"/>-->
<!--                        <img class = " p-10 m-auto d-flex" width="120" src="--><?//=base_url()?><!--resource/uploads/buffer-logo.svg"/>-->
<!--                    </div>-->
<!--                    <div id="carousel-example-generic1" class="carousel slide " data-ride="carousel">-->
<!--                        <div class="carousel-inner slider-inner card slider-card-h">-->
<!--                                <div class="item active p-30">-->
<!--                                    <div class = "row slider-v-center">-->
<!--                                        <div class = "col-md-12 slider-text black-color">-->
<!--                                            <h3 class = "pb-30 slider-text-h">“HostingHills has been a trusted partner for our critical domain names. As we continue to grow, we know we can always count on them.”</h3>-->
<!--                                            <img class = "m-auto d-flex" width="100" src="--><?//=base_url()?><!--resource/uploads/figma-logo.svg"/>-->
<!--                                            <h4 class = "text-align-center">Dylan Field, Co-founder and CEO, Figma</h4>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="item p-30">-->
<!--                                    <div class = "row slider-v-center">-->
<!--                                        <div class = "col-md-12 slider-text black-color">-->
<!--                                            <h3 class = "pb-30 slider-text-h">“We've been using HostingHills for all our domains for years, and have always been able to count on them. Their technology just works, and their support is phenomenal. Highly recommended!”</h3>-->
<!--                                            <img class = "m-auto d-flex" width="100" src="--><?//=base_url()?><!--resource/uploads/imgur-logo.svg"/>-->
<!--                                            <h4 class = "text-align-center">Alan Schaaf, founder and CEO, Imgur</h4>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="item p-30">-->
<!--                                    <div class = "row slider-v-center">-->
<!--                                        <div class = "col-md-12 slider-text black-color">-->
<!--                                            <h3 class = "pb-30 slider-text-h">“With a high value domain name like Privacy.com, it's important to use a registrar that you trust. We can sleep at night knowing that HostingHills is keeping our asset secure.”</h3>-->
<!--                                            <img class = "m-auto d-flex" width="100" src="--><?//=base_url()?><!--resource/uploads/privacy-logo.svg"/>-->
<!--                                            <h4 class = "text-align-center">Bo Jiang, CEO, Privacy.com</h4>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                            <div class="item p-30">-->
<!--                                <div class = "row slider-v-center">-->
<!--                                    <div class = "col-md-12 slider-text black-color">-->
<!--                                        <h3 class = "pb-30 slider-text-h">“HostingHills has quickly become our default registrar for the various domain names we use as part of our Buffer offering. A clear and intuitive dashboard combined with wide support across a number of top-level domains and a responsive team add up to an unbeatable experience.”</h3>-->
<!--                                        <img class = "m-auto d-flex" width="100" src="--><?//=base_url()?><!--resource/uploads/buffer-logo.svg"/>-->
<!--                                        <h4 class = "text-align-center">Colin Ross, Engineering Manager, Buffer</h4>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <a class="left carousel-control" href="#carousel-example-generic1" style = "background-image: none !important;" data-slide="prev">-->
<!--                            <span class="black-color glyphicon glyphicon-chevron-left"></span>-->
<!--                        </a>-->
<!--                        <a class="right carousel-control slider-next-style" href="#carousel-example-generic1" style = "background-image: none !important;" data-slide="next">-->
<!--                            <span class="black-color glyphicon glyphicon-chevron-right"></span>-->
<!--                        </a>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

	<section class="whitesmoke-wrapper background-color-secondary">
		<div class="container inner">
			<div class="row">

				<div class="col-md-12">
					<div class = "row p-40 mb-40" >
						<h2 style = "text-align:center; margin-bottom:10px" class = "white-color">Why HostingHills</h2>
						<h3 style = "text-align:center" class = "orange-color">Simple - it's all about you</h3>
					</div>
					<div class="row p-20 m-20 change-order d-flex align-item-center">
						<div class="col-sm-5 wow fadeInUp">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/private.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 wow fadeInUp">
							<h2 class="text-align-center mb-10 white-color" >Privacy and security</h2>
							<h3 data-nsfw-filter-status="swf" class = "light-grey">Your website security and privacy comes first at HostingHills, and we will always support the rights of individuals and consumers online. It’s our mission to keep the Internet open, free, and safe for everyone.</h3>
						</div>
					</div>
					<div class="row p-20 m-20 change-order d-flex align-item-center" >
						<div class="col-sm-5 order-one">
							<h2 style="text-align: center; " class = "white-color">Your business online</h2>
							<h3 data-nsfw-filter-status="swf" class = "light-grey">Boost your business with industry-premium products and services, at prices that won’t break your budget. If it doesn’t provide you with a better Internet experience, we simply don’t offer it.</h3>
						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 order-two">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/business.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
					</div>
					<div class="row p-20 m-20 change-order d-flex align-item-center">
						<div class="col-sm-5 wow fadeInUp">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/customer.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 wow fadeInUp">
							<h2 style="text-align: center;" class = "white-color">Customer service</h2>
							<h3 data-nsfw-filter-status="swf" class = "light-grey">You’re covered by a Support Team that’s renowned for being one of the most knowledgeable, friendly, and professional in the business. Real people are ready to assist you with any issue, any time, 24/7.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- container -->
	<div class = "">
		<div class="container inner ">
			<div class="row ">

				<!-- Sidebar -->
				<?php if ( $page->sidebar_left == 1 ) { ?>
					<aside class="col-sm-3 sidebar_left">
						<?php blocks( 'sidebar_left', get_slug() ); ?>
					</aside>
				<?php } ?>
				<!-- /Sidebar -->

				<!-- main content -->
				<section class=" 
				<?php
				if ( $page->sidebar_right == 1 && $page->sidebar_left == 1 ) {
					echo 'col-md-6'; } elseif ( $page->sidebar_right == 1 || $page->sidebar_left == 1 ) {
					echo 'col-md-9'; } else {
						echo 'col-md-12 0'; }
					?>
				">

<!--                    <?php //blocks('content_top', get_slug()); ?>-->
					<!--<?php echo $page->body; ?> -->
					<div class = "row p-40 mb-40" >
						<h2 style = "text-align:center; margin-bottom:10px" class = "black-color">Every step to online success</h2>
						<h3 style = "text-align:center">Bring your website to life, and help it thrive</h3>
					</div>
					<div class="row p-20 m-20 change-order d-flex align-item-center">
						<div class="col-sm-5 wow fadeInUp">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/domain.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 wow fadeInUp">
							<h2 class="text-align-center mb-10 black-color" >Buy a domain</h2>
							<h3 data-nsfw-filter-status="swf" class = "grey">Register a domain name and create your online identity. Use our advanced domain name generator to get your ideal choice right away. Already have a domain registered somewhere else? No problem — domain transfers are free and easy.</h3>
							<h3 class = "orange-color">Discover all domain extensions →</h3>
						</div>
					</div>
					<div class="row p-20 m-20 change-order d-flex align-item-center" >
						<div class="col-sm-5 order-one">
							<h2 style="text-align: center; " class = "black-color">Find the right hosting for your domain</h2>
							<h3 data-nsfw-filter-status="swf">Whether you want speed, simplicity, space, or super-power, we’ve got you covered. Choose from shared, VPS, dedicated, and Managed WordPress options. Or, try Site Maker to get a personal site online.</h3>
							<h3 class = "orange-color">Choose a hosting package →</h3>
						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 order-two">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/hosting.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
					</div>
					<div class="row p-20 m-20 change-order d-flex align-item-center">
						<div class="col-sm-5 wow fadeInUp">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/email.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 wow fadeInUp">
							<h2 style="text-align: center;" class = "black-color">Add professional email</h2>
							<h3 data-nsfw-filter-status="swf">Impress your customers by sending emails from @yourwebsite.com. Get secure, reliable Private Email connected to your domain, complete with business tools and calendar from just $11.88 a year.</h3>
							<h3 class = "orange-color">See email plans →</h3>
						</div>
					</div>
					<div class="row p-20 m-20 change-order d-flex align-item-center" >
						<div class="col-sm-5 order-one">
							<h2 style="text-align: center;" class = "black-color">Security for you and your customers</h2>
							<h3 data-nsfw-filter-status="swf">Take the stress out of security with low-cost SSL Certificates, PremiumDNS, VPN and more. Plus a range of features — like 2-Factor Authentication — included completely free with your account.</h3>
							<h3 class = "orange-color">Secure yourself →</h3>
						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 order-two">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/security.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
					</div>

					<div class="row p-20 m-20 change-order d-flex align-item-center">
						<div class="col-sm-5 wow fadeInUp">
							<div style="text-align: center;">
								<img loading="lazy" src="<?php echo base_url(); ?>resource/images/boost.svg" data-nsfw-filter-status="sfw" style="visibility: visible;">
							</div>

						</div>
						<div class = "col-sm-2"></div>
						<div class="col-sm-5 wow fadeInUp">
							<h2 style="text-align: center; " class = "black-color">Boost performance with our apps</h2>
							<h3 data-nsfw-filter-status="swf">Power-up your business with our range of apps. From our Visual Suite to Supersonic CDN, we have the tools ready-and-waiting to aid your business’ performance.</h3>
							<h3 class = "orange-color">Select apps →</h3>
						</div>
					</div>


					<div class="inner">
<!--                        --><?php //blocks('content_bottom', get_slug()); ?>
					</div>

				</section>
				<!-- /main -->

				<!-- Sidebar -->
				<?php if ( $page->sidebar_right == 1 ) { ?>
					<aside class="col-sm-3 sidebar_right">
						<?php blocks( 'sidebar_right', get_slug() ); ?>
					</aside>
				<?php } ?>
				<!-- /Sidebar -->

			</div>
		</div>


	</div>

	<!-- Full width -->
	<section class="white-wrapper">
		<div class="row">
			<div class="col-md-12">
				<?php blocks( 'full_width_content_bottom', get_slug() ); ?>
			</div>
		</div>
	</section>

	<!-- Normal width -->



<!--    <section class="whitesmoke-wrapper">-->
<!--        <div class="container inner">-->
<!--            <div class="row">-->
<!--                <div class="col-md-12">-->
<!--                    --><?php //blocks('page_bottom', get_slug()); ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->



	<section class="white-wrapper background-color-secondary">
		<div class="container inner">
			<div class="row">
				<div class="col-md-12">
					<h1 class = "text-align-center white-color">Unleash our full potential</h1>
					<h3 class = "text-align-center orange-color">Extra support and knowledge is waiting for you</h3>
				</div>
				<div class = "row mb-40">
					<div class = "col-lg-4 col-md-6 col-sm-6 col-xs-8 p-30 card-center">
						<div class ="card">
							<img class = "w-100 card-image" src="<?php echo base_url(); ?>resource/uploads/card-support.svg"/>
							<div class = "p-30 background-color-white">
								<div class = "card-content">
									<h2 class = "black-color mb-10">First site support</h2>
									<h4 class = "card-text mb-20">Learn while you build as we talk you through everything from your first domain onwards. Our Resource Center has the answers.</h4>
								</div>
								<a href="#" class = "btn btn-danger w-100 p-10 card-btn">
									Get started
								</a>
							</div>
						</div>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-6 col-xs-8 p-30 card-center">
						<div class ="card">
							<img class = "w-100 card-image" src="<?php echo base_url(); ?>resource/uploads/card-discover.svg"/>
							<div class = "p-30 background-color-white" >
								<div class = "card-content">
									<h2 class = "black-color mb-10">Discover our blog</h2>
									<h4 class = "card-text mb-20">See the latest industry news, get inspirational business tips, find our latest promos, and much more in our extensive blog.</h4>
								</div>
								<a href="#" class = "btn btn-danger w-100 p-10 card-btn">
									Get learning
								</a>
							</div>
						</div>
					</div>
					<div class = "col-lg-4 col-md-6 col-sm-6 col-xs-8 p-30 card-center" >
						<div class ="card">
							<img class = "w-100 card-image" src="<?php echo base_url(); ?>resource/uploads/card.svg"/>
							<div class = "p-30 background-color-white">
								<div class = "card-content">
									<h2 class = "black-color mb-10">Transfer to more</h2>
									<h4 class = "card-text mb-20">Get extra support and savings by transferring your domain to us. Plus, carry over any time your domain has left</h4>
								</div>
								<a href="#" class = "btn btn-danger w-100 p-10 card-btn">
									Transfer today
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class = "row mt-40 m-20 p-20 align-item-center d-lg-flex card-center w-md-50 " >
					<div class = "col-sm-3">
						<img style = "width:250px;" class = "d-flex m-auto"  src="<?php echo base_url(); ?>resource/uploads/subscription-section-img.svg"/>
					</div>

					<div class = "col-md-4">
						<h3 class = "white-color mb-10">Stay inspired</h3>
						<h4 class = "card-text mb-20 light-grey">Get all the latest Offers, articles, and industry news straight to your mailbox every month</h4>
					</div>
					<div class = "col-md-5 d-flex " style = "align-self:center">
						<input class = "w-75 form-control" style = "height:50px" placeholder="you@yours.com">
						<button class = "btn btn-danger w-25">Join</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="white-wrapper">
		<div class="container inner">
			<div class="row">
				<div class="col-md-12">
					<section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
						<div class="container">
							<h1 class = "black-color mb-30">Frequently asked questions</h1>
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading1">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
												Why buy a domain name from HostingHills?
											</a>
										</h3>
									</div>
									<div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">Above all else, we strive to deliver outstanding customer experiences. When you buy a domain name from HostingHills, we guarantee it will be handed over to you with superior standards of service and support. Our primary goal is to build a customer-focused atmosphere filled with the happiest customers in the galaxy. The HostingHills guarantee is our mark of excellence.</h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading2">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
												Why is domain name registration required?
											</a>
										</h3>
									</div>
									<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">When you build a website, you want visitors to come and see what you've done. To get them there, you need a unique domain name that connects to your site's servers. Domain name registration is required to ensure that no one else in the world can claim ownership of your site's address and to make finding your website simple. </h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading3">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
												How does domain registration work?
											</a>
										</h3>
									</div>
									<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">Think of the name you want to register. The answer is typically your company or website name. It is best to keep your domain name short and easy to understand. Say it out loud, and make sure it sounds great. Next, search to see if it is available. If the name you desire is taken with the .com top-level domain, there are hundreds of others available. Finally, add the top choices to your cart and complete the domain registration.</h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading4">
										<h3 class="panel-title">
											<a class="collapsed " role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
												What domains are available from HostingHills?
											</a>
										</h3>
									</div>
									<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">At HostingHills, you can register brand new domain names using hundreds of popular TLDs. In our Marketplace, you will find thousands of domain names that have already been registered but are now for sale. While .com domains are available, of course, you'll also see options using .net, .us, and many more.</h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading5">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
												Can you buy domain names and sell them?
											</a>
										</h3>
									</div>
									<div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">If you have purchased domain names that you no longer need, you can sell them through HostingHills. When you are ready to sell, you can list your domain in our </h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading5">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
												What’s the best way to find a cheap domain?
											</a>
										</h3>
									</div>
									<div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">It’s all about knowing where to look. We’ve gathered together our most popular </h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading6">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
												What’s the best way to find a cheap domain?
											</a>
										</h3>
									</div>
									<div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">It’s all about knowing where to look. We’ve gathered together our most popular </h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading7">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7">
												How do I choose the right domain registrar?
											</a>
										</h3>
									</div>
									<div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">While price is a big factor, there are also other areas to consider when choosing the right domain registrar. These include customer support, security, and effortless account management. All of which come as standard with HostingHills — alongside a great price, of course.</h4>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading p-3 mb-3" role="tab" id="heading8">
										<h3 class="panel-title">
											<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapse8">
												How do I pick the right domain name?
											</a>
										</h3>
									</div>
									<div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
										<div class="panel-body pl-30"  style = "border:none;">
											<h4 class = "card-text">So you’ve discovered that simply Googling ‘register website domain’ and finding a great provider isn’t the whole story. You also need to consider which domain extension to pick, and which name to register. So check out our simple guide to choosing the best domain.</h4>
										</div>
									</div>
								</div>

							</div>



						</div>
					</section>
				</div>
			</div>
		</div>
	</section>

	<!-- Normal width -->
<!--    <section class="white-wrapper">-->
<!--        <div class="container inner">-->
<!--            <div class="row">-->
<!--                <div class="col-md-12">-->
<!--                    --><?php //blocks('footer_top', get_slug()); ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

</div>
