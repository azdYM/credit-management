import { BodyContentContext, ClientContext, HeaderContentContext, UserContext, UserData } from "../functions/context"
import React, {useState} from "react"
import { ClientData } from "./CardClient"

export const HeaderContentProvider = ({children}: React.PropsWithChildren) => 
{
  const [columns, setColumns] = useState<Array<any>>([])

  return (
    <HeaderContentContext.Provider value={
      {columns, setColumns: (columns) => setColumns(columns)}
    }>
      {children}
    </HeaderContentContext.Provider>
  )
}

export const BodyContentProvider = ({children}: React.PropsWithChildren) => 
{
  const [contents, setContents] = useState<Array<any>>([])

  return (
    <BodyContentContext.Provider value={{
      contents: contents, 
      updateContents: (newContent) => {
        setContents((currentContents) =>  [...currentContents, newContent])
      }
    }}>
      {children}
    </BodyContentContext.Provider>
  )
}

export const ClientProvider = function ({children, client}: React.PropsWithChildren<{client: ClientData|undefined}>)
{
  if (client === null || client === undefined) {
    return 
  }

  return (
    <ClientContext.Provider value={client}>
      {children}
    </ClientContext.Provider>
  )
}

export const UserProvider = function ({children, user}: React.PropsWithChildren<{user: UserData|undefined}>)
{
  if (user === null || user === undefined) {
    return 
  }

  return (
    <UserContext.Provider value={user}>
      {children}
    </UserContext.Provider>
  )
}