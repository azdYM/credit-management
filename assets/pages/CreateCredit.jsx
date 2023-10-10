import React from 'react'
import { Page } from '/components/Page'

export const CreateCredit = () => {
  const pageTitle = "Création d'un crédit"
  return (
    <Page title={pageTitle}>
				<h1 className="page-title">{pageTitle}</h1>
    </Page>
  )
}