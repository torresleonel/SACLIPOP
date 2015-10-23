/*+++++++++++++++---------------------++++++++++++++FUNCION PARA SheepIt ++++++++++++++-------------------------------+++++++++++++++++++++*/


$(document).ready(function() {

				var sheepItForm = $('#sheepItForm').sheepIt({
					separator: '',
					allowRemoveLast: true,
					allowRemoveCurrent: true,
					allowRemoveAll: true,
					allowAdd: true,
					allowAddN: true,
					maxFormsCount: 0,
					minFormsCount: 0,
					iniFormsCount: 0,
					removeLastConfirmation: false,
					removeCurrentConfirmation: true,
					removeAllConfirmation: true,
					removeLastConfirmationMsg: '¿Está seguro que desea eliminar los datos del familiar del trabajador?',
					removeCurrentConfirmationMsg: '¿Está seguro que desea eliminar los datos del familiar del trabajador?',
					removeAllConfirmationMsg: '¿Está seguro que desea eliminar los datos del familiar del trabajador?',
				});

			});